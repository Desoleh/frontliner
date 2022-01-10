<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegProvince extends Model
{
    use HasFactory;

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'provinces','id');
    }



}
