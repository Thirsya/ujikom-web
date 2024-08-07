<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori', 'keterangan'];

    public function kategori()
    {
        return $this->hasMany(Kategori::class,'id_kategori');
    }
}


