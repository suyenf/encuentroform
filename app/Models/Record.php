<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
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

    public function people(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Person::class);
    }
}
