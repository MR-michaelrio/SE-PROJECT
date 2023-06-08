<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;
    protected $table = 'bookmark';

    protected $primaryKey = 'bookmark_id';

    protected $fillable = [
        'bookmark_id',
        'bundle_id',
        'user_id'
    ];
    public function Bundle()
    {
        return $this->belongsTo(Bundle::class,'bundle_id','bundle_id');
    }
}
