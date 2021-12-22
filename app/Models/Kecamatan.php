<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function dataSurvey()
    {
        return $this->hasMany(DataSurvey::class, 'kecamatan_id');
    }
    public function detailSurvey()
    {
        return $this->hasMany(DetailSurvey::class, 'kecamatan_id');
    }
    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
