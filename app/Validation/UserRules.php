<?php namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    /**
     * @param string $str
     * @param string $
     * @param $fields
     * @param array $data
     * @return bool
     */
    public function authenticateUser(string $str, string $fields, array $data){
        $model = new UserModel();
        $user =$model->where('email', $data['email'])->first();

        if(!$user){
            return false;
        } else{
            return password_verify($data['password'], $user['password']);
        }
    }
}