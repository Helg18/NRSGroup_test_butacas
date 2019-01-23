<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reservation
 * @package App
 */
class Reservation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reserved_at',
        'persons',
        'comments',
    ];

    /**
     * Relation between butacas and reservations
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function butacas()
    {
        return $this->belongsToMany(Butaca::class)->withTimestamps();
    }

}
