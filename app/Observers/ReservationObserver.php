<?php

namespace App\Observers;

use App\Reservation;

class ReservationObserver
{
    /**
     * Handle the reservation "created" event.
     *
     * @param  \App\Reservation $reservation
     * @return void
     */
    public function created(Reservation $reservation)
    {
        /** @var Reservation $reservation */
        logger("A new reservation has been created successfully.
Reservation: " . $reservation->id . ",
For: " . $reservation->persons . " persons
Reservated at: " . $reservation->reserved_at . "
Comments: " . $reservation->comments . "
Created_at: " . $reservation->created_at . "
");
    }

    /**
     * Handle the reservation "updated" event.
     *
     * @param  \App\Reservation $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        /** @var Reservation $reservation */
        logger("A reservation has been updated successfully.
Reservation: " . $reservation->id . ",
For: " . $reservation->persons . " persons
Reservated at: " . $reservation->reserved_at . "
Comments: " . $reservation->comments . "
Created_at: " . $reservation->created_at . "
");
    }

    /**
     * Handle the reservation "deleted" event.
     *
     * @param  \App\Reservation $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        /** @var Reservation $reservation */
        logger("A reservation has been deleted successfully.
Reservation: " . $reservation->id . ",
For: " . $reservation->persons . " persons
Reservated at: " . $reservation->reserved_at . "
Comments: " . $reservation->comments . "
Created_at: " . $reservation->created_at . "
");
    }

    /**
     * Handle the reservation "restored" event.
     *
     * @param  \App\Reservation $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        /** @var Reservation $reservation */
        logger("A reservation has been restored successfully.
Reservation: " . $reservation->id . ",
For: " . $reservation->persons . " persons
Reservated at: " . $reservation->reserved_at . "
Comments: " . $reservation->comments . "
Created_at: " . $reservation->created_at . "
");
    }

    /**
     * Handle the reservation "force deleted" event.
     *
     * @param  \App\Reservation $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        /** @var Reservation $reservation */
        logger("A reservation has been deleted successfully.
Reservation: " . $reservation->id . ",
For: " . $reservation->persons . " persons
Reservated at: " . $reservation->reserved_at . "
Comments: " . $reservation->comments . "
Created_at: " . $reservation->created_at . "
");
    }
}
