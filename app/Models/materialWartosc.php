<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materialWartosc extends Model
{
    use HasFactory;
    public function Opis(){
        return $this->hasOne(rodzajeMa::class, 'id', 'rodzmas_id');
    }
}
