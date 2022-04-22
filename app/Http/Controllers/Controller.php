<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function get_sms_token($length){
		return rand(
			((int) str_pad(1, $length, 0, STR_PAD_RIGHT)),
			((int) str_pad(9, $length, 9, STR_PAD_RIGHT))
		);
	}
}