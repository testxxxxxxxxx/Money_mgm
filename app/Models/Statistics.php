<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistics extends Model
{
    use HasFactory;

    protected $table="statistiscs";

    protected $fillable=[

        "id",
        "month",
        "price"

    ];

    public function price()
    {
        return $this->hasOne(Receipt::class);

    }

}
