<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipe_publish extends Model
{
    use HasFactory;
    protected $table = 'recipe_publish';

    protected $primaryKey = 'publish_id';

    protected $fillable = [
        'user_id',
        'recipe_id',
        'publish_date',
    ];

    public function User()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
    public function Recipe()
    {
        return $this->belongsTo(Recipe::class,'recipe_id','recipe_id');
    }
    public function BundleList()
    {
        return $this->belongsTo(Bundle_List::class,'publish_id','publish_id');
    }
}
