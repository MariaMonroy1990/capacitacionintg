<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
   // protected $table="resources";
   // protected $conection="pgsql";

   public function article(){
     //aqui especifico de muchos a uno
     return $this->belongTo(Article::class,'articles_id','id');

}

}
