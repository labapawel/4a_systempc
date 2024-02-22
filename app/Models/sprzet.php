<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sprzet extends Model
{
    use HasFactory;
    public $fillable = ['serialno','rodz_id','model','salaid','stanowisko','marka'];
}
