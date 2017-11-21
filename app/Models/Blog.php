<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model{

    protected  $table = 'blogs';
    //查找
    public function findById($id){

        return $this->where('id',$id)->first()->toArray();
    }
    //删除
    public function deleteById($id){

        $this->where('id',$id)->delete();
    }
}
