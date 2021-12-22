<?php

namespace App\Models;

use App\Models\DataSurvey;
use App\Models\DetailSurveys;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'kecamatans';

    public function dataSurvey()
    {
        return $this->hasMany(DataSurvey::class, 'kecamatan_id');
    }

    public function detailSurvey()
    {
        return $this->hasMany(DetailSurveys::class, 'kecamatan_id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}
