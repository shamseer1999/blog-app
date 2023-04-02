<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','description','author_id'
    ];

    public function author()
    {
        return $this->hasOne(User::class,'id','author_id');
    }
}
