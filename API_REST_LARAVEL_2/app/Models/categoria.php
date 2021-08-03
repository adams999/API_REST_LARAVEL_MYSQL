<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    public $timestamps = false; // para que no nos traiga las fechas de creacion ni de actualizacion
    protected $fillable = ['id', 'cat_nom', 'cat_obs']; //aqui se agregan cada campo de nuestra db para establecer el modelo de dicha db
}
