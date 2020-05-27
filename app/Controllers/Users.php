<?php namespace App\Controllers;


class Users extends BaseController
{
    //making login here
    public function index()
    {
        echo phpinfo();
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
//        echo view('code_wall', $data);
        //create data for code_wall
        //change code_wall page, to display code
        echo view('templates/footer', $data);
    }

    /**
     * This function calls login screen.
     */
    public function login(){
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){

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
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'nickname'          => ['label' => 'Nickname',          'rules' => 'required|alpha_numeric|min_length[3]|max_length[30]'],
                'email'             => ['label' => 'Email address',     'rules' => 'required|min_length[6]|max_length[60]|valid_email|is_unique[users.email]'],
                'password'          => ['label' => 'Password',          'rules' => 'required|min_length[8]|max_length[255]'],
                'password_confirm'  => ['label' => 'Confirm password',  'rules' => 'required|matches[password]']
            ];

            if(! $this->validate($rules)){
                $data['validation'] = $this->validator;
            } else{

            }
        }

        echo view('templates/header', $data);
        echo view('register', $data);
        echo view('templates/footer', $data);
    }
    //--------------------------------------------------------------------

    /**
     * This function calls profile screen for given username.
     */
    public function profile($username){
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('profile', $data);
        //load profile data for given user
        echo view('templates/footer', $data);
    }

    //--------------------------------------------------------------------
}