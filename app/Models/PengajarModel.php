<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajarModel extends Model
{
    protected $table = 'table_pengajar_dosen';
    protected $primaryKey = 'id_dosen';
    protected $guarded = [
        'updated_by'
    ];
    
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;

    use HasFactory;
}
