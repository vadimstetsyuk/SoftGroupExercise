<?php

namespace App\Model;

use App\Model\Mapper;
use App\Model\UserEntity;

class UserMapper extends Mapper
{
    public function validate(UserEntity $user)
    {
        $qb = $this->db->createQueryBuilder();
        $name = $user->getName();
        $qb->select('*')->from('users')->where("name='$name'");
        $rows = $qb->execute();
        $res = $rows->fetch();
      
        if ($res == NULL){
          return false;
        }
        return $res;
    }
}
