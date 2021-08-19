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
        'price'

    ];

    public function statistics()
    {
        return $this->belongsTo(Statistics::class);

    }

}
