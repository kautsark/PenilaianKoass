<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterMudaModel extends Model
{
    use HasFactory;
    
    protected $table = 'table_peserta_didik';
    protected $primaryKey = 'id_peserta';
    protected $guarded  =['updated_by'];
    public $timestamps = ['created_at'];
    const UPDATED_AT = null;

    
}
