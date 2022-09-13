<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Notifications\NewSubscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscribers'
        ]);
        $subscribers = new Subscriber();
        $subscribers->email=$request->email;
        $subscribers->save();
        Notification::route('mail', $subscribers->email)->notify(new NewSubscriber($subscribers));
        toastr::success('Congrats! You are now our new subscriber.You Will get a mail notification in this email','success');
        return redirect()->back();
    }
}
