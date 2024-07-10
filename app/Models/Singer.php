<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    protected $table = 'singers';

    protected $fillable = [
        'name',
        'nationality',

    ];

    public $timestamp = false;

    public function albums(){
        return $this->hasMany(Album::class);
    }

}
