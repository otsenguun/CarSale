<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cars;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $users =User::paginate(5);
        return view('backend.user.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.usercreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $rules = [
        'email' => 'required|unique:users|max:100'

            ];

            $customMessages = [
                'email.required' => 'Хэрэглэгчийн нэр оруулнуу !',
                'email.unique' => 'Хэрэглэгчийн и-майл давхардаж байна !'

            ];


            $this->validate($request, $rules, $customMessages);

         User::create([
                 'user_name' => $request->input('name'),
                 'email' => $request->input('email'),
                 'role'=>$request->input('role'),
                 'password' => bcrypt($request->input('password')),
        ]);
        return redirect('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $user= User::findOrFail($id);
         $cars= Cars::where('user_id','=',$user->id)->get();
         
          return view('backend.user.usershow',compact('user','cars'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.user.useredit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $user= User::findOrFail($id);

         $user->update([
                 'user_name' => $request->input('name'),
                 'email' => $request->input('email'),
                 'role'=>$request->input('role'),
                 'password' => bcrypt($request->input('password')),
        ]);
     
       return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $user->delete();
        return redirect('user');
    }
}
