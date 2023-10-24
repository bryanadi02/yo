<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi'
    ];
    protected $table = 'jenis_kontak';

    // public function kontak(){
    //     return $this->hasMany('App\Models\Kontak' , 'id_jenis');
    // }

    public function siswa(){
        return $this->belongsToMany('App\Models\Siswa');
    }
}
