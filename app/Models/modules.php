<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modules extends Model
{
    protected $guarded = [];
    use HasFactory;
    // adding foreign key of category id to category table and using it  in subcategoryview
    public function prof()
    {
        // adding foreign key of category id to category table and using it  in subcategoryview
        return $this->belongsTo(professeur::class, 'id_professeur', 'id');
    }
}
