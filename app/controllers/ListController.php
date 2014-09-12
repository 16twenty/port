<?php

use Hugofirth\Mailchimp\Facades\MailchimpWrapper;

class ListController extends Controller {
    
    public function subscribe() {     
        $valid = Validator::make(
                                 array('First Name' =>  Input::get('firstname'),
                                       'Last Name' => Input::get('lastname'),
                                       'email'=>Input::get('email')),
                                 array('First Name' => 'required|alpha',
                                        'Last Name' => 'required|alpha',
                                        'email'=>'required|email'));
        if($valid->passes()) {
            $temp = MailchimpWrapper::lists()->getList();
        
            $listid = $temp['data'][0]['id'];
            $mergevars = array('FNAME'=>Input::get('firstname'),'LNAME'=>Input::get('lastname'));
            $email = array('email'=>Input::get('email'));
            try {
                MailchimpWrapper::lists()->subscribe($listid,$email,$mergevars); 
                return View::make('pages/vip')->with(array('success'=>1));
            } catch(Mailchimp_Error $e) {
                return View::make('pages/vip')->with(array('chimperror'=>$e->getMessage()));
            }
        } else {
            return View::make('pages/vip')->withErrors($valid);
        }
    }
}