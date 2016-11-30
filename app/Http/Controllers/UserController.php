<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // $this->middleware('auth');
        $this->middleware('nonAdmin');
    }
    public function updateList(){
        return view('User.update_list');
    }
    public function delete(){
        return view('User.delete_list');
    }
    public function home(){
        return view('User.welcome_user');
    }
    public function done(){
        return 'user added ';
    }
    public function index()
    {
        $users = User::all();
        return view('User.all_user',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.add_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

//
//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'email' => 'required|unique:users|max:255',
//            'password' => 'required|max:255',
//        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= $request->secret;
        $user->save();

        return redirect('/user');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('User.update',compact('user'));
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


//        $this->validate($request, [
//            'name' => 'required|max:255',
//            'email' => 'required|unique:users|max:255',
//            'password' => 'required|max:255',
//        ]);

        $user = User::find($id);

        $user->name = $request->title;
        $user->email = $request->email;

            $user->password = $request->secret;

        $user->save();
        return redirect('/user');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();


    }
}

