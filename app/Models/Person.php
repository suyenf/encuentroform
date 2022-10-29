<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model // singular  uno
{
    use HasFactory;

    protected $fillable=[
        'name',
        'gender',
        'dob',
        'record_id',
    ];

    protected $dates=[
        'dob',
    ];


    public function record(): \Illuminate\Database\Eloquent\Relations\BelongsTo // RELACION
    {
        return $this->belongsTo(Record::class); // belongs to // pertenece a
    }
}
