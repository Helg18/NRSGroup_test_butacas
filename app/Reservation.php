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
        'user_id'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get owner full name from reservation
     * @return bool
     */
    public function ownerFullname()
    {
        return $this->user ? $this->user->fullName() : false;
    }

    /**
     * Get owner email from reservation
     * @return bool
     */
    public function ownerEmail()
    {
        return $this->user ? $this->user->email : false;
    }

}
