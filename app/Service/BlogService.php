<?php
    namespace App\Service;
    use App\Models\Blog;

class BlogService{

   public function getById($id){

       Blog::findById($id);
   }
   public function deleteById($id){

       Blog::deleteById($id);
   }
}