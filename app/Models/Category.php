<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table="category";

    protected $fillable=[

        "id",
        "name"

    ];

    public function receipt()
    {
        return $this->hasOne(Receipt::class,'foreign_key','name');

    }

}
