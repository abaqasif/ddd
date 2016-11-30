<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pageAdmin');
    }
    public function home(){
        return view('Page.welcome_page');
    }
    public function index()
    {
        $pages = Page::all();
        return view('Page.all_page',compact('pages'));

    }
    public function done(){
        return 'page added ';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Page.add_page');
    }
    public function updateList(){
        return view('Page.update_list');
    }
    public function delete(){
        return view('Page.delete_list');
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
        $this->validate($request, [
            'url' => 'required|max:255',
            'pg_name' => 'required|max:255',

        ]);

        $page = new Page;
        $page->name = $request->pg_name;
        $page->url = $request->url;

        $page->save();

        return redirect('/page');
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
        $page = Page::find($id);
        return view('Page.update',compact('page'));

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
        $this->validate($request, [
            'url' => 'required|max:255',
            'pg_name' => 'required|max:255',

        ]);
        $page = Page::find($id);
        $page->name = $request->pg_name;
        $page->url = $request->url;
        $page->save();
        return redirect('/page');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $page = Page::find($id);
        $page->delete();
        return redirect('/page');
    }
}

