<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    public $table = 'stocks';
    public $timestamps = false;
    protected $fillable = ['item','total', 'available', 'item_type', 'date'];
}
