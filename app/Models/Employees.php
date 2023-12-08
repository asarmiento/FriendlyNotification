<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public function tStore()
    {
       return $this->belongsTo(TStore::class, 'store_id','id');
    }
}
