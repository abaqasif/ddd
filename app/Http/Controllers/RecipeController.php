<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Recipe;
use App\Raw_Material;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(){
        return view('Recipe.home');
    }
    public function UpdateHome(){

        echo "heyy";
 //$recipes = Recipe::all();
 //        return view('Recipe.update_home' , compact('recipes'));
    }

    public function DeleteHome(){

        return view('Recipe.delete_home');

    }

    public function index()
    {
        //
        $recipes = Recipe::all();
        return view('Recipe.recipe_list', compact('recipes'));

    }

    public function rm_list($id){

$rms= \DB::table('raw_materials')
->join('recipe_rm','raw_materials.rm_code','=','recipe_rm.rm_code')
    ->select('raw_materials.*','recipe_rm.qty','recipe_rm.rm_code',\DB::raw('recipe_rm.qty*raw_materials.rate AS amount'))
->where('recipe_rm.recipe_id','=',$id)
    ->get();

       // $recipe =  \DB::table('recipes')->where('id','=',$id)->first();
        $totalCost = 0;
      foreach($rms as $rm){
          $totalCost = $totalCost + ($rm->qty*$rm->rate);
      }

$recipe = Recipe::find($id);

         return  view('Recipe.rm_list',compact('rms','recipe','totalCost'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Recipe.add_recipe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


       public function update_home($id){
        $recipe = Recipe::find($id);
        return view ('Recipe.update_home' , compact('recipe'));
        }

    public function update_recipe_done(Request $request , $id){
//        $this->validate($request, [
////            'brand' => 'required|max:255',
////            'type' => 'required|max:255',
////            'shade' => 'required|max:255',
////            'type_id' => 'required|max:5',
//           'batchsize' => 'required|max:255',
//
//        ]);

        $recipe = Recipe::find($id);
        $recipe->brand = $request->brand;
        $recipe->type = $request->type;
        $recipe->shade = $request->shade;
        $recipe->UOM = $request->UOM;
        $recipe->type_id = $request->type_id;
        $recipe->batchsize = $request->batchsize;
        $recipe->save();

return redirect('/production/recipe/'.$recipe->id.'/update');
    }

    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'brand' => 'required|max:255',
            'type' => 'required|max:255',
            'shade' => 'required|max:255',
            'type_id' => 'required|max:5',
            'batchsize' => 'required|max:255',

        ]);

        $recipe = new Recipe;
        $recipe->id = $request->id;
        $recipe->brand = $request->brand;
        $recipe->type= $request->type;
        $recipe->shade= $request->shade;
        $recipe->UOM= $request->UOM;
        $recipe->type_id = $request->type_id;
        $recipe->batchsize= $request->batchsize;
        $recipe->min_stock = 0;
        $recipe->save();

  $rec = $recipe->id;

        return redirect('/production/recipe/'.$rec.'/add_rm');

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
        $recipe = Recipe::find($id);
        return view('Recipe.update_recipe' , compact('recipe'));


    }
    public function rm_edit($id)
    {
        //

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rm_update_home($id){

        $rms= \DB::table('raw_materials')
            ->join('recipe_rm','raw_materials.rm_code','=','recipe_rm.rm_code')
            ->select('raw_materials.*','recipe_rm.recipe_id','recipe_rm.qty','recipe_rm.rm_code')
            ->where('recipe_rm.recipe_id','=',$id)
            ->get();

        return view('Recipe.rm_update' , compact('rms'));
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function rm_update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // $recipe = Recipe::find($id)->delete();

        \DB::table('recipes')->where('id', '=',$id)->delete();

        $access = \DB::table('recipe_rm')->where('recipe_id', '=',$id)->exists();
if($access) {
    \DB::table('recipe_rm')->where('recipe_id', '=', $id)->delete();
}
        return redirect()->back();
    }
}
