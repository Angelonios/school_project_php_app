<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    //making login here
    public function index()
    {
        $data = [];
        echo view('templates/header', $data);
        echo view('code_wall', $data);
        echo view('templates/footer', $data);
        log_message('info', 'Loaded Users controller with index.');
    }

    /**
     * This function calls login screen.
     */
    public function login(){
        $data = [];

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email'             => ['label' => 'Email address',     'rules' => 'required|min_length[6]|max_length[60]|valid_email'],
                'password'          => ['label' => 'Password',          'rules' => 'required|min_length[8]|max_length[255]|authenticateUser[email,password]'],
            ];

            $errors = [
                'password' => [
                    'authenticateUser' => 'User authentication failed.'
                ]
            ];

            if(!$this->validate($rules, $errors)){
                //authentication unsuccessful
                $data['validation'] = $this->validator;
            } else{
                //authentication successful
                $model = new UserModel();
                $user = $model->where('email', $this->request->getVar('email'))->first();
                $this->setUserSession($user);
                return redirect()->to('/timeline/index');
            }
        }

        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer', $data);
    }
    //--------------------------------------------------------------------

    /**
     * This function first checks if post method has been used in last request.
     * If the last request used post method, it validates fields
     */
    public function register(){
        $data = [];

        if($this->request->getMethod() == 'post'){
            $rules = [
                'nickname'          => ['label' => 'Nickname',          'rules' => 'required|alpha_numeric|min_length[3]|max_length[30]'],
                'email'             => ['label' => 'Email address',     'rules' => 'required|min_length[6]|max_length[60]|valid_email|is_unique[Users.email]'],
                'password'          => ['label' => 'Password',          'rules' => 'required|min_length[8]|max_length[255]'],
                'password_confirm'  => ['label' => 'Confirm password',  'rules' => 'required|matches[password]']
            ];

            if(!$this->validate($rules)){
                //validation unsuccessful
                $data['validation'] = $this->validator;
            } else{
                //validation successful
                $model = new UserModel();
                $newData = [
                    'nickname'      => $this->request->getVar('nickname'),
                    'email'         => $this->request->getVar('email'),
                    'password'      => $this->request->getVar('password'),
                    'created_at'    => date('Y-m-d H:m:s'),
                    'type'          => 'user',
                    'active'        => true
                ];
                try{
                    $model->save($newData);
                } catch (\ReflectionException $reflectionException){
                    log_message('error', 'Reflection exception caught during registration process. Details: '.$reflectionException->getMessage());
                }
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/users/login');
            }
        }

        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }

    //--------------------------------------------------------------------

    private function setUserSession($user){
        $data = [
            'id'            => $user['id'],
            'nickname'      => $user['nickname'],
            'email'         => $user['email'],
            'type'          => $user['type'],
            'isLoggedIn'    => true
        ];

        session()->set($data);
    }
}