<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordcompany extends Model
{
    use HasFactory;

    protected $table = 'recordcompanies';

    protected $fillable = [
        'name',
        'city',

    ];

    public $timestamp = false;

    public function albums(){
        return $this->hasMany(Album::class);
    }

}
