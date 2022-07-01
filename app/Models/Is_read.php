<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Is_read extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function Etudiant_info()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Notification_Info()
    {
        return $this->belongsTo(notifications::class, 'notification_id', 'id');
    }
}
