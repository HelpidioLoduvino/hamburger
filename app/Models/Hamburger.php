<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hamburger extends Model
{
    use HasFactory;
    public $table = 'hamburgers';
    public $timestamps = false;
    protected $fillable = ['burger_name', 'burger_descr', 'burger_price', 'burger_img'];
}
