<?php namespace App\Models;

use CodeIgniter\Model;

class CodePostModel extends Model
{

    protected $table            = 'CodePosts';
    protected $allowedFields    = ['category_id', 'created_by', 'description', 'code_content'];
    protected $beforeInsert     = ['beforeInsert'];
    protected $beforeUpdate     = ['beforeUpdate'];

    public function beforeInsert(array $data){

    }

    public function beforeUpdate(array $data){

    }
}