<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementModel extends Model
{
    protected $table = "table_ksm_unitkerja";
    protected $primaryKey = "id_ksm";
    protected $guarded = [
        'updated_by'
    ];
    protected $fillable = [
        'role_name'
    ];

    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
    use HasFactory;
}
