<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;


class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accessAdmin');
    }

    public function home(){
        return view('Access.welcome_access');
    }
    public function updateList(){
      //  $users =  \DB::select('SELECT * FROM page_user where page_id is not null');
        $users= \DB::table('users')
            ->join('page_user','users.id','=','page_user.user_id')
            ->join('pages','page_user.page_id','=','pages.id')
            ->select(\DB::raw('page_user.id AS id'),\DB::raw('users.name AS user_name'),\DB::raw('pages.name AS page_name'),\DB::raw('users.id AS user_id') , \DB::raw('pages.id AS page_id'))
            ->get();

        return view('Access.update_list',compact('users'));
    }
    public function delete(){
        $users= \DB::table('users')
            ->join('page_user','users.id','=','page_user.user_id')
            ->join('pages','page_user.page_id','=','pages.id')
            ->select(\DB::raw('page_user.id AS id'),\DB::raw('users.name AS user_name'),\DB::raw('pages.name AS page_name'),\DB::raw('users.id AS user_id') , \DB::raw('pages.id AS page_id'))
            ->get();
        return view('Access.delete_list' , compact('users'));
    }
    public function index()
    {
        //
        $users= \DB::table('users')
            ->join('page_user','users.id','=','page_user.user_id')
            ->join('pages','page_user.page_id','=','pages.id')
            ->select(\DB::raw('page_user.id AS id'),\DB::raw('users.name AS user_name'),\DB::raw('pages.name AS page_name'),\DB::raw('users.id AS user_id') , \DB::raw('pages.id AS page_id'))
            ->get();


        return view('Access.all_access',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Access.add_access');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'page_id' => 'required|exists:pages,id|max:255',
            'user_id' => 'required|exists:users,id|max:255',
        ]);

        \DB::table('page_user')->insert(['user_id' => $request->user_id , 'page_id' => $request->page_id ]);



        return redirect('/access');








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
        $temp =\DB::table('page_user')
            ->select('user_id')->where('id', '=',$id)->get();



       $user = User::findorfail($temp[0]->user_id);



//return $user->id;

      return view('Access.update',compact('user'));
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
        //

//        $access = \DB::table('page_user')->where('id', '=',$id)->pluck('page_id');
//
//
//         return redirect('/access');
//
//        $this->validate($request, [
//            'page_id' => 'required|exists:pages,id|max:255',
//        ]);

       \DB::table('page_user')
           ->where('id','=',$id)
           ->update([ 'page_id' => $request->page_id ]);



        return redirect(url('/access'));





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        \DB::table('page_user')->where('id', '=', $id)->delete();

return redirect('/access');

    }
}
