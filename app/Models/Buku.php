<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = array ('kode_buku', 'judul_buku', 'penerbit', 'tahun_terbit','pengarang');

    //untuk melakukan table field created_at dan updated_at secara otomatis
    public $timestamps = true;
}