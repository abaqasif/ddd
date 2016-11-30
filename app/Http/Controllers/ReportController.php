<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Filling;
use Illuminate\Http\Request;

use App\Http\Requests;

class ReportController extends Controller
{
    //
    public function dpr_home(){
        return view('Reports.dpr_home');
    }

    public function get_dpr(Request $request){
        $to = strtotime($request->to_date);
$to_date = date('d-m-y',$to);

        $from = strtotime($request->from_date);
        $from_date = date('d-m-y',$from);

        echo "<br>";




      $rows = \DB::table('recipes')
          ->join('batches' , 'batches.recipe_id' , '=' , 'recipes.id')
          ->join('fillings' , 'fillings.batch_id' ,'=' ,'batches.id')
          ->select('batches.id AS batch_id', 'recipes.*' ,  'batches.num' ,'fillings.id as filling_id', 'fillings.weight' , 'fillings.unit', 'batches.created_at AS batch_pdate' ,
              'fillings.created_at AS fill_pdate')
          ->get();
//
        $arr = array();
        foreach($rows as $row){
           $pdate = date('d-m-y',strtotime($row->fill_pdate));



if($to_date == $pdate) {


    $entry = \DB::table('recipes')
        ->join('batches' , 'batches.recipe_id' , '=' , 'recipes.id')
        ->join('fillings' , 'fillings.batch_id' ,'=' ,'batches.id')
        ->select('batches.id AS batch_id', 'recipes.*' ,  'batches.num' ,'fillings.id as filling_id', 'fillings.weight' , 'fillings.unit', 'batches.created_at AS batch_pdate' ,
            'fillings.created_at AS fill_pdate')
        ->where('fillings.id' , '=' , $row->filling_id)
        ->get()->toArray();

array_push($arr , $entry);
}

        }
//return $arr[0]->num;
return view('Reports.daily_production' , compact('arr' , 'to_date' , 'from_date' , 'pdate'));
    }

    public function mixing_home(){
return view('Reports.mp_home');
    }
    public function mixing_cost_home(){
        return view('Reports.mpwc_home');
    }

    public function get_mixing_paper(Request $request){
        $batch = Batch::where('num' , '=' , $request->batch_num)->get();

        $recipe= \DB::table('recipes')
            ->join('batches' , 'batches.recipe_id' , '=' , 'recipes.id')
            ->where('batches.id' , '=' ,  $batch[0]->id)
            ->get();

//        $bds = \DB::table('batch_details')
//            ->where('batch_id' , '=' , $batch[0]->id)
//            ->select('id' , 'additional' , 'qty' ,
//               \DB::raw("additional+qty AS total"),
//               // \DB::raw("additional+qty*100/sum(total) AS %age"),
//                'rm_code')
//            ->get();

$bds = \DB::select("select id,rm_code,additional,qty, additional+qty AS total,
                    additional+qty*100/sum(additional+qty) AS percentage 
                    from batch_details
                    where batch_id = ? 
                    group by id,rm_code,additional,qty,total"
                 , [$batch[0]->id]);

       $fillings  = \DB::table('fillings')
        ->join('packings' , 'fillings.packing_id' , '=' ,'packings.id')
        ->where('fillings.batch_id' , '=' , $batch[0]->id)
           ->select('fillings.*' , 'packings.weight AS pkg_wt')
       ->get();

        $total_fill  = \DB::table('fillings')
            ->join('packings' , 'fillings.packing_id' , '=' ,'packings.id')
            ->where('fillings.batch_id' , '=' , $batch[0]->id)
            ->select('fillings.*' , 'packings.weight AS pkg_wt')
            ->sum('fillings.weight');

$tests =  \DB::table('batch_test')
    ->join('tests' , 'batch_test.test_id' , '=' , 'tests.id')
    ->where('batch_test.batch_id' , '=' , $batch[0]->id)
    ->get();


        return view('Reports.mixing_paper' , compact('fillings' , 'tests' , 'recipe' , 'batch','bds'));
    }


    public function get_mixing_cost(Request $request){

    }
}
