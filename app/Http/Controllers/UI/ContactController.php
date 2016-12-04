<?php

namespace App\Http\Controllers\UI;

use App\Http\Requests\ContactRequest;

use Mail;
use App\Website;

class ContactController extends BaseController
{
	public function index()
	{
		return view("ui.contact");
	}

	public function send(ContactRequest $request)
	{
		$info=Website::where('name','email_send')->orWhere('name','password_send')->get();

		$data=array();
        foreach ($info as $key => $value) {
             $data[$value->name]=$value->content;
        }
        $data['email']=trim($request->email);
        $data['name']=trim($request->name);
        $data['subject']=trim($request->subject);
		Mail::send('ui.contentmail', array('content'=>$request->message), function ($message) use($data) {
		    $message->from($data['email'], $data['name']);

		    $message->to($data['email_send'])->subject('Liên hệ: '.$data['subject']);
		});
		return redirect('lien-he.html')->with('message','Gửi thành công liên hệ. Chúng tôi sẽ trả lời cho bạn trong thời gian sớm nhất.');
	}
}