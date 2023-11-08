<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPermission extends Pivot
{
    use HasFactory;

    protected $table = 'user_permissions';

    protected $fillable = [
        'user_id','permission_id'
    ];
}
