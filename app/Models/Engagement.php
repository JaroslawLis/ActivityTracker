<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engagement extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'starting_date', 'type', 'target', 'end_date', 'max_value'];
}
