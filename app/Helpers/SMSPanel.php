<?php

namespace App\Helpers;

class SMSPanel{
	
    static function sentOTP($mobile_number, $otp_token){
		$curl_url = 'http://www.alots.in/sms-panel/api/http/index.php';
		$curl_url .= '?username=XeamSMSportal';
		$curl_url .= '&apikey=67191-3D5D9';
		$curl_url .= '&apirequest=Text';
		$curl_url .= "&sender=XEAMHR";
		$curl_url .= "&mobile=$mobile_number";
		$curl_url .= "&message=".urlencode("Your confidential OTP for kaamindia website is:$otp_token");
		$curl_url .= '&route=TRANS&format=JSON';
		$curl_url .= '&TemplateID=1207161537322932666';		
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $curl_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
		));

		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
    }
}