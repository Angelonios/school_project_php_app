<?php namespace App\Controllers;


use App\Models\CategoryModel;
use App\Models\CodeLanguageModel;
use App\Models\CodePostModel;

class Timeline extends BaseController
{

    public function index()
    {
        log_message('info', 'Controller: Timeline; Method: index;');
        $data = [];
        echo view('templates/header', $data);
        echo view('code_post_timeline', $data);
        echo view('templates/footer', $data);
    }

    public function code_post(){
        log_message('info', 'Controller: Timeline; Method: code_post;');
        $data = [];
        $languages = new CodeLanguageModel();
        $categories = new CategoryModel();
        $data['languages'] = $languages->findAll();
        $data['categories'] = $categories->findAll();

        if($this->request->getMethod() == 'post'){
            $rules = [
                'code'          => ['label' => 'Code',          'rules' => 'required|min_length[2]|max_length[65535]'],
                'description'   => ['label' => 'Description',   'rules' => 'required|min_length[2]|max_length[255]'],
                'category'      => ['label' => 'Category',      'rules' => 'required|in_list['.$this->validation_list($data['categories'], 'name').']'],
                'language'      => ['label' => 'Language',      'rules' => 'required|in_list['.$this->validation_list($data['languages'], 'codemirror_mode').']']
            ];

            if(!$this->validate($rules)){
                //validation unsuccessful
                $data['validation'] = $this->validator;
            } else{
                //validation successful
                $model = new CodePostModel();
                $newData = [
                    'code_content'      => $this->request->getVar('code'),
                    'description'       => $this->request->getVar('description'),
                    'category_id'       => $this->get_id($data['categories'], 'name', $this->request->getVar('category')),
                    'created_by'        => session()->get('id'),
                    'code_language_id'  => $this->get_id($data['languages'], 'codemirror_mode', $this->request->getVar('language'))
                ];
                try{
                    $model->save($newData);
                } catch (\ReflectionException $reflectionException){
                    log_message('error', 'Reflection exception caught during registration process. Details: '.$reflectionException->getMessage());
                }
                $session = session();
                $session->setFlashdata('success', 'Your code has been posted');
                return redirect()->to('/timeline');
            }
        }

        echo view('templates/header');
        echo view('create_post', $data);
        echo view('templates/footer');
    }

    private function validation_list(array $data, string $target){
        $result = [];
        foreach ($data as $item){
            array_push($result, $item[$target]);
        }
        return implode($result, ",");
    }

    private function get_id(array $data, string $target, string $name){
        foreach ($data as $item){
            if($item[$target] === $name){
                return $item['id'];
            }
        }
    }
}