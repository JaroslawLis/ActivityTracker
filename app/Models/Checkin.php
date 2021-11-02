<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'id_engagement', 'value'];

    public function checkins()
    {
        return $this->hasMany(Engagement::class);
    }
}
