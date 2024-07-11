<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'title',
        'singer_id',
        'recordcompany_id',
        'year',
        'tracks',
        'duration',

    ];

    public $timestamps = false;

    public function singer(){
        return $this->belongsTo(Singer::class);
    }



    public function recordcompany(){
        return $this->belongsTo(Recordcompany::class);
    }

    public function category() {
        return $this->belongsToMany(Category::class, 'album_category');
    }



}
