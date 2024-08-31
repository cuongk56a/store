<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='categories';
    protected $guarded = [];

    public function categoryChildrent(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function categoryProduct(){
        return $this->hasMany(Product::class, 'category_id');
    }
}
