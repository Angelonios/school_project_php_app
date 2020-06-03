<?php namespace App\Models;

use CodeIgniter\Model;

class CodePostModel extends Model
{

    protected $table            = 'CodePosts';
    protected $allowedFields    = ['category_id', 'created_by', 'description', 'code_content', 'code_language_id'];
//    protected $beforeInsert     = ['beforeInsert'];
//    protected $beforeUpdate     = ['beforeUpdate'];
//    protected $afterFind        = ['afterFind'];
//
//    public function beforeInsert(array $data){
//
//    }
//
//    public function beforeUpdate(array $data){
//
//    }
//
//    public function afterFind(){
//
//    }
}