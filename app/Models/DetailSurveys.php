<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailSurveys extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'detail_surveys';

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
