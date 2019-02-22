<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{ 
    public function send(Request $request) {
        $to = $request->input('to');
        $subject = $request->input('subject');
        $content = $request->input('content');

        $data = array(
            'to' => $to,
            'subject' => $subject,
            'content' => $content
        );

        Mail::send('email', $data, function($message) use($request){
           $message->to($request->input('to'))->subject($request->input('subject'));
           $message->from('ikhalas.00@gmail.com','Ikhalas Mannoon');
        });
        echo "Email Sent. Check your inbox. by Ikhalas";
     }
}

