<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.contactUs');
    }
    public function dashboardIndex()
    {
        $messages=Message::orderBy('created_at', 'DESC')->get();
    return view('dashboard.messages')->with(['messages'=>$messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      $validator= Validator::make($request->all(),[
        'name'=>'required|max:20',
        'email'=>'required|email',
        'subject'=>'required|max:30',
        'message'=>'required'
    ]);
    
    if ($validator->fails()) {
        return redirect()->route('productform')
            ->withInput()
            ->withErrors($validator);
    }
    
    $message=new Message();
    $message->name=$request->name;
    $message->email=$request->email;
    $message->subject=$request->subject;
    $message->message=$request->message;
    $message->save();
    
    
    return redirect()->route('show.contactus')->with(['status'=> 'Message Sent Seccussfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
