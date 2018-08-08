<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    
            //  sendmail

    public function send(Request $request){

         
                $content = $request->content;
            $email = $request->email;
            $name = $request->name;
            $phone = $request->phone;
       
            Mail::send('mail', ['content' => $content, 'phone' => $phone], function ($message) use ($email, $name){
                $message->to('info@car-sale.mn', $email)->subject($name);
            });



            

    }



    
}
