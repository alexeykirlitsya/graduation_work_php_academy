<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class IndexPageController extends Controller
{
    public function show()
    {
        return view('pages.page');
    }

    public function about()
    {
        return view('pages.all.about');
    }

    public function contact()
    {
        return view('pages.all.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'topic' => 'required|min:5|max:100',
            'message' => 'required|min:10'
        ]);

        $email = $request->email;
        $topic = $request->topic;
        $message = $request->message;

        Mail::to('alexeykirlitsya@gmail.com')->send(new Contact($topic, $message, $email));
        return redirect()->route('contact.page')->with('success', 'Ваше письмо было успешно отправлено!');
    }
}
