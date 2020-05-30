<?php namespace App\Controllers;


class Timeline extends BaseController
{

    public function index()
    {
        $data = [];
        echo view('templates/header', $data);
        echo view('code_wall', $data);
        echo view('templates/footer', $data);
        log_message('info', 'Loaded Timeline controller with index.');
    }
}