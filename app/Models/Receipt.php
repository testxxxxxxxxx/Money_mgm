<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $table="receipt";

    protected $fillable=[

        'id',
        'name',
        'products',
        'month',
        'price',
        'user_id'

    ];

    public function statistics()
    {
        return $this->belongsTo(Statistics::class);

    }

}
