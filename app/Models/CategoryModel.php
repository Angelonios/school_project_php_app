<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    protected $table            = 'Categories';
    protected $allowedFields    = ['code_language_id', 'name'];
    protected $beforeInsert     = ['beforeInsert'];
    protected $beforeUpdate     = ['beforeUpdate'];
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