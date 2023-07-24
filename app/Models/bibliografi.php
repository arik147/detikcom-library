<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bibliografi extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kategori(){
        return $this->belongsTo('App\Models\kategori');
    }

}
