<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $table="demands";
    protected $fillable = [
        'budget', 'phone', 'ville','commentaire',
    ];

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
