<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['title', 'active'];

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

}
