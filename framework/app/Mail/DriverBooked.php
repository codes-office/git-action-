<?php
/*
@copyright

Fleet Manager v6.5

Copyright (C) 2017-2023 Hyvikk Solutions <https://hyvikk.com/> All rights reserved.
Design and developed by Hyvikk Solutions <https://hyvikk.com/>

 */
namespace App\Mail;

use App\Model\Bookings;
use Hyvikk;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DriverBooked extends Mailable {
	use SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public $booking;
	public function __construct(array $data)
    {
        $this->data = $data;
    }

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from(Hyvikk::get("email"))->subject('Ride Booked - Booking ID: ' . $this->data['booking_id'])
		->markdown('emails.booked_driver')
		->with('data', $this->data);
	}
}