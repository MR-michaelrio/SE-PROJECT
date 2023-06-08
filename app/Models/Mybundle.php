<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mybundle extends Model
{
    use HasFactory;
    protected $table = 'mybundle';

    protected $primaryKey = 'mybundle_id';

    protected $fillable = [
        'user_id',
        'bundlelist_id',
        'Bundle_privacy'
    ];
    public function BundleList()
    {
        return $this->belongsTo(Bundle_List::class,'bundlelist_id','bundlelist_id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
