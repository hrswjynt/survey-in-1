<?php

namespace App\Models;

use App\Models\DetailSurveys;
use App\Models\DetailSurvey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'users';

    public function dataSurvey()
    {
        return $this->hasMany(DataSurvey::class, 'users_id');
    }
    public function detailSurvey()
    {
        return $this->hasMany(DetailSurveys::class, 'users_id');
    }
}
