<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianModel extends Model
{
    use HasFactory;

    protected $table= 'table_penilaian_header';
    protected $primaryKey = 'id_nilai';
    protected $guarded = [
        'updated_by'
    ];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}
