<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function bibliografis(){
        return $this->hasMany('App\Models\bibliografi');
    }
}
