<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_tp extends Model
{
    protected $guarded = [];
    use HasFactory;


    public function remises()
    {
        return $this->belongsTo(modules_tp::class, 'id_module_tp', 'id');
    }

    public function userinfo()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
