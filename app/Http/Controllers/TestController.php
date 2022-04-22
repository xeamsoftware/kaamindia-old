<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Helpers\SMSPanel;

class TestController extends Controller
{
    public function test()
    {
        echo bcrypt("1234");
    }

    public function sms_test()
    {
        $response = SMSPanel::sentOTP("9467121217", "9898");
        echo "<pre>";
        print_r($response);
        echo "</pre>";
    }
}