<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'kabupaten_id');
    }
}
