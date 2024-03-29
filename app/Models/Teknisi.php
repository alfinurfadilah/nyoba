<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    use HasFactory;
    protected $table = 'teknisi';
    protected $fillable = [
        'nama_teknisi',
        'site',
        'id_site'
    ];

    public function reportsurvey()
    {
        return $this->hasOne(reportsurvey::class, 'id_site');
    }

    public function fsite(){
        return  $this->belongsTo(Site::class,  'id_site',  'id');
        }

    public function reportsurveys()
    {
        return $this->belongsToMany(reportsurvey::class, 'reportsurvey_teknisi', 'id_reportsurvey', 'id_teknisi');
    }
}
