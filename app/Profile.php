<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = [
        'avatar', 'about', 'user_id', 'facebook', 'linkedin', 'instagram',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
