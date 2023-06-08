<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;
    protected $table = 'bundle';

    protected $primaryKey = 'bundle_id';

    protected $fillable = [
        'bundle_id',
        'bundle_name',
        'bundle_publishdate'
    ];
    protected $casts = [
        'bundle_publishdate' => 'date',
    ];
    public function BundleList()
    {
        return $this->belongsTo(Bundle_List::class,'bundle_id','bundle_id');
    }
    public function Bookmark()
    {
        return $this->belongsTo(Bookmark::class,'bundle_id','bundle_id');
    }
}
