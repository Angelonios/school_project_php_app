<?php


namespace App\Models;


use CodeIgniter\Model;

class CodeLanguageModel extends Model
{

    protected $table            = 'CodeLanguages';
    protected $allowedFields    = ['name', 'codemirror_mode'];
//    protected $afterFind        = ['afterFind'];

//    public function afterFind(){
//
//    }

}