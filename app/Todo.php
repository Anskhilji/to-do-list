<?php

namespace App;

use App\step;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'completed', 'user_id', 'description'];

    public function steps()
    {
        return $this->hasMany(step::class);
    }
}
