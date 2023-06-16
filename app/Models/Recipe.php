<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipe';

    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'recipe_id',
        'recipe_name',
        'recipe_ingredients',
        'recipe_equipment',
        'recipe_steps',
        'recipe_tips',
        'recipe_picture',
        'category_id',
    ];
    public function recipe_publish()
    {
        return $this->belongsTo(recipe_publish::class,'recipe_id','recipe_id');
    }

    public function Category()
    {
        return $this->belongsTo(Category::class,'category_id','category_id');
    }
}
