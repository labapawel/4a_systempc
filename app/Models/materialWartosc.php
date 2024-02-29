<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialWartosc extends Model
{
    use HasFactory;
    public $fillable = ['wartosc','rodzmas_id','sprz_id'];
    public function Opis(){
        return $this->hasOne(rodzajeMa::class, 'id', 'rodzmas_id');
    }
}
