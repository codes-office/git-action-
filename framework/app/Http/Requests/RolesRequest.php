<?php

/*
@copyright

Fleet Manager v6.5

Copyright (C) 2017-2023 Hyvikk Solutions <https://hyvikk.com/> All rights reserved.
Design and developed by Hyvikk Solutions <https://hyvikk.com/>

 */

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		if (Auth::user()->user_type != "C") {
			return true;
		} else {
			abort(404);
		}
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name' => 'required',
		];
	}

	public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $checkboxes = $this->except(['_token', 'name']);
            $isChecked = false;

            foreach ($checkboxes as $checkbox) {
                if ($checkbox == '1') {
                    $isChecked = true;
                    break;
                }
            }

            if (!$isChecked) {
                $validator->errors()->add('checkboxes', __('fleet.at_least_one_checkbox'));
            }
        });
    }
}
