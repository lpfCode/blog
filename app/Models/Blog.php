<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{

    protected  $table = 'blogs';
    //查找
    public function findById($id){

        return $this->where('id',$id)->first()->toArray();
//        $id = "';grant sss -pxxx;'";
//        $sql = "select * ftom tab where id=?"
//            $this->runSql($sql, $sql_params);
    }
    //删除
    public function deleteById($id){

        $this->where('id',$id)->delete();
    }
}
