<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model // singular uno
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'group',
        'qty',
        'phone',
        'email',
        'locked',
    ];

    protected $casts=[
        'locked'=>'boolean',
    ];
    /**
     * @var mixed
     */
    private $email;

    public function people(): \Illuminate\Database\Eloquent\Relations\HasMany  // relacion
    {
        return $this->hasMany(Person::class); // has many // tiene muchos/as
    }
}
