<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Butaca
 * @package App
 */
class Butaca extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'col',
        'row',
        'available',
    ];

    /**
     * Relation between Butaca and Reservation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reservations()
    {
        return $this->belongsToMany(Reservation::class)->withTimestamps();
    }

}
