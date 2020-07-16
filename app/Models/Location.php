<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $guarded = ['id'];
    protected $fillable = [
        'adresse', 'capacity', 'imge', 'lat','long','price','superficie','wifi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
