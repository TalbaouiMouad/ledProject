<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $users=User::orderBy('created_at', 'DESC')->get();
            return view('dashboard.users')->with(['users'=>$users]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
    
    }
    public function addAdminForm(){
        return view('dashboard.addAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin'=>['required']
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard.addAdmin')
            ->withErrors($validator)
            ->withInput();
        }
        $user=new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->is_admin=$request['is_admin'];
        $user->save();
        return redirect()->route('dashboard.users')->with('status','Admin added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }
    public function showUpdateForm($id){
        $user=User::find($id);
        return view('auth.update')->with('user',$user);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    {
        $id=$request->input('id');
      
        $user = User::find($id);
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id'=> ['required'],
            'is_admin'=> ['required'],
           
        ]);

        if ($validator->fails()) {
            return redirect()->route('user.updateProfile',['id'=>$user->id])
            ->withErrors($validator)
            ->withInput();
        }
        
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=Hash::make($request['password']);
        $user->is_admin=$request['is_admin'];
        $user->save();
        
        return redirect()->route('home')
        ->with(['status'=>'product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
       return redirect()->route('dashboard.users')
       ->with(['status'=>'User deleted successfully']);
    }
}
