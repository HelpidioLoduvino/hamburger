<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoftDrink extends Model
{
    use HasFactory;
    public $table = 'soft_drinks';
    public $timestamps = false;
    protected $fillable = ['stock_id','drink_name','drink_price'];
}
