<?php

namespace App\Core\Eloquent;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};
use Str;

class Category extends Model
{
   //significa qued voy a interactuar metodos que van a dar funcionalidad con mi clase
   //SoftDeletes.-  si es fuera es una importacion
   use SoftDeletes;   //trait
   
   
    protected $table="categories";
    protected $conection="pgsql";

    // voy a definir una variable de asignacion masiva y espoecificar  mis campos de asignacion masiva

 protected $fillable=['name','description'];//fillable cuando extraigo los objetos de la base de datos estos camopos los voy a presentar


 public static function boot()
 {
      //creating  : son funciones previas
   static::creating(function ($model){
      //lleno los atributos que necesito
      $model->slug=Str::slug($model->name);
      $model->created_user=1;
      $model->updated_user=1;
   });

   static::updating(function($model){
       $model->updated_user=1;
   });
   parent::boot();

 }

 public function getNameAttribute($value)
{
    return Str::upper($value);

}

public function setNameAttribute($value)
{
    $this->attributes['name']=Str::upper($value);

}


}
