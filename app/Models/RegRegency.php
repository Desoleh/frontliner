<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegRegency extends Model
{
    use HasFactory;

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'regencies','id');
    }

    public function usereducation()
    {
        return $this->hasOne(UserEducation::class, 'regencies','id');
    }

}
