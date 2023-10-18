<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianDetailKoassModel extends Model
{
    use HasFactory;
    protected $table= 'table_penilaian_detail';
    protected $primaryKey = 'id_nilai_detail';
    protected $guarded = [
        'updated_by'
    ];
    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}
