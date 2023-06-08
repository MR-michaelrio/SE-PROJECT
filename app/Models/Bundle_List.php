<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle_List extends Model
{
    use HasFactory;
    protected $table = 'bundle_list';

    protected $primaryKey = 'bundlelist_id';

    protected $fillable = [
        'bundlelist_id',
        'publish_id',
        'bundle_id'
    ];
    public function Bundle()
    {
        return $this->belongsTo(Bundle::class,'bundle_id','bundle_id');
    }
    public function MyBundle()
    {
        return $this->belongsTo(MyBundle::class,'bundlelist_id','bundlelist_id');
    }

    public function recipe_publish()
    {
        return $this->belongsTo(recipe_publish::class,'publish_id','publish_id');
    }

    
}
