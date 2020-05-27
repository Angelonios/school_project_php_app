<?php namespace App\Controllers;


class Users extends BaseController
{
    //making login here
    public function index()
    {
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
        echo view('templates/header', $data);
        echo view('login');
        //create login page
        echo view('templates/footer', $data);
    }
    //--------------------------------------------------------------------

    /**
     * This function calls register screen.
     */
    public function register(){
        $data = [];
        helper(['form']);
        echo view('templates/header', $data);
        echo view('register', $data);
        //create register page
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