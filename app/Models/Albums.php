<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pictures()
    {
        return $this->hasMany(Pictures::class,'album_id');
    }

}
