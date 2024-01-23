<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    protected $fillable = array ('nama', 'jenis_kelamin', 'tanggal_lahir', 'email');

    //untuk melakukan table field created_at dan updated_at secara otomatis
    public $timestamps = true;
}