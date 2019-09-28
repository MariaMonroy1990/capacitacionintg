<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
   // protected $table="articles";
   // protected $conection="pgsql";

   public function resources(){
       //aqui especifico que un articulo tiene muchos recursos
     return $this->hasMany(Resource::class,'articles_id','id');

   }

   public function article(){
    //aqui especifico de muchos a uno
    return $this->belongTo(Article::class,'articles_id','id');

   }
}
