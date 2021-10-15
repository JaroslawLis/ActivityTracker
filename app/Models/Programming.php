<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Programming extends Model
{
    use HasFactory;

    protected $table = "programming";
    protected $fillable = ["date", "duration"];

    public function getData()
    {
    }
}
