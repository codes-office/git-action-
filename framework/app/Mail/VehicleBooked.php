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
use Illuminate\Support\Facades\Log;

class VehicleBooked extends Mailable {
	use SerializesModels;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */

	public function __construct($data)
    {
		$this->data = $data;
       
    }
	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build() {
		return $this->from(Hyvikk::get("email")) ->subject('Ride Booked')
		->markdown('emails.booked_customer')->with([
			'data' => $this->data  // Passing the data array to the view
		]);
	}
}
