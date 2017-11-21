<?php
    namespace App\Service;
    use App\Models\Blog;

class BlogService{

   public function getById($id){

       $a = (new Blog())->findById($id);
        dd($a);
   }
   public static function deleteById($id){

       Blog::deleteById($id);
   }
}