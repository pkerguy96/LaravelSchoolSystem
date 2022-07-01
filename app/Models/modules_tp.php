<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modules_tp extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function moduledata()
    {
        return $this->belongsTo(modules::class, 'id_module', 'id');
    }
}
