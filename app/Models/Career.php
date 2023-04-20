<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'career',
        'location',
        'start_date',
        'end_date',
        'career_type_id',
        'image',
        'user_id',
    ];
    
    public function skills() {
        return $this->belongsToMany(Skill::class);
    }

    public function careerType() {
        return $this->belongsTo(CareerType::class, 'career_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
