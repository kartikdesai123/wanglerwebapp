<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Contactus extends Model {

    protected $table = "contactus";

    public function add($request) {

        
        $mailData['data'] = $request;
        $mailData['subject'] = 'From Wagler Maple Products';
        $mailData['attachment'] = array();
        $mailData['template'] = "emailtemplate.contact";
        $mailData['bcc'] = 'helpdesk@radiusimpact.ca';
        $mailData['mailto'] = 'christophe@mirageinfo.ca';
        $mailData['cc'] = 'waglers@waglermapleproducts.ca';
        $first_name = $request->input('first_name');
        
        $pathToFile = $mailData['attachment'];
        $frommail = env('MAIL_USERNAME');
        $mailsend = Mail::send($mailData['template'], ['data' => $mailData['data']], function ($m) use ($mailData, $pathToFile, $frommail, $first_name) {
                    $m->from($frommail, 'Wagler Maple Products');

                    $m->to($mailData['mailto'], $first_name)->subject($mailData['subject']);
                    if ($pathToFile != "") {
                        // $m->attach($pathToFile);
                    }

                      $m->cc($mailData['cc']);
                      $m->bcc($mailData['bcc']);
                });
        
        
        
        $objContactus = new Contactus();
        $objContactus->firstname = $request->input('first_name');
        $objContactus->lastname = $request->input('last_name');
        $objContactus->email = $request->input('u_email');
        $objContactus->subject = $request->input('u_subject');
        $objContactus->messege = $request->input('u_message');
        if(($objContactus->save()) && ($mailsend == null)){
            return true;
        } else {
            return false;
        }
    }

}
