<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAdmin extends Model
{
    use HasFactory;
    protected $table="petugas",
     $primaryKey = 'id_petugas',
     $fillable = ['nama_tps','alamat_tps'];

}
