<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSeason extends Model
{
    use HasFactory;

    protected $table = 'product_season'; // テーブル名を明示的に指定

    protected $fillable = ['product_id', 'season_id'];
}
