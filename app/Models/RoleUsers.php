<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUsers extends Model
{
    use HasFactory;

    protected $table= 'table_role_users';
    protected $primaryKey = 'id_role';
    protected $guarded = [
        'updated_by'
    ];
    protected $fillable = [
        'role_name'
    ];

    public $timestamps = ["created_at"];
    const UPDATED_AT = null;
}
