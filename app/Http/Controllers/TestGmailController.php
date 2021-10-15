<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class TestGmailController extends Controller
{
    public function send()
    {
        $data = array('name' => "Virat");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('vengtear1399@gmail.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
            $message->from('vengtear555@gmail.com', 'Virat Gandhi');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}
