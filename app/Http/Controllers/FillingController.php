<?php
namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Filling;
use App\Batch;
use App\Packing;
class FillingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
      //  $this->middleware('productionAdmin');
    }
    public function home($id)
    {
        $fills = \DB::table('fillings')
            ->join('packings', 'packings.id', '=', 'fillings.packing_id')
            ->where('batch_id', '=', $id)
            ->select('fillings.*', 'packings.name', 'packings.weight AS pck_weight')
            ->get();
        $total_fill = 0;
        foreach ($fills as $fill){
            $total_fill += $fill->weight;
    }
$filling_date = Batch::where('id', '=', $id)->select('filling_date')->get();
       $batch = Batch::find($id);
        return view('Batch.Filling.home', compact('batch', 'fills','filling_date' , 'total_fill'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
public function lock($id){
$batch = Batch::find($id);
    $batch->filling_lock = true;
$batch->save();
    $drums = \DB::table('fillings')
        ->join('packings' ,  'packings.id' , '=' ,'fillings.packing_id')
        ->where('batch_id', '=', $id)
        ->select('fillings.*' , 'packings.name' , 'packings.weight AS pck_weight')
        ->where('packings.name' , '=' , 'drum')
        ->get()->toArray();
if($drums==null) {
    $n = 0;
        }
        else {
            $n = $drums[0]->qty;
        }
        for ($x = 0; $x < $n; $x++) {
            $item = new Item;
            $item->filling_id = $drums[0]->id;
            $item->active = false;
            $item->cost_price = 00000;
            $item->price = 1230;
           $item->save();
        }
    $quarters = \DB::table('fillings')
        ->join('packings' ,  'packings.id' , '=' ,'fillings.packing_id')
        ->where('batch_id', '=', $id)
        ->select('fillings.*' , 'packings.name' , 'packings.weight AS pck_weight')
        ->where('packings.name' , '=' , 'quarter')
        ->get()->toArray();
    if($quarters==null) {
        $n = 0;
    }
    else {
        $n = $quarters[0]->qty;
    }
        for ($x = 0; $x < $n; $x++) {
            $item = new Item;
            $item->filling_id = $quarters[0]->id;
            $item->active = false;
            $item->cost_price = 00000;
            $item->price = 4560;
           $item->save();
        }
    $gallons = \DB::table('fillings')
        ->join('packings' ,  'packings.id' , '=' ,'fillings.packing_id')
        ->where('batch_id', '=', $id)
        ->select('fillings.*' , 'packings.name' , 'packings.weight AS pck_weight')
        ->where('packings.name' , '=' , 'gallon')
        ->get()->toArray();
    if($gallons==null) {
        $n = 0;
    }
    else {
        $n = $gallons[0]->qty;
    }
        for ($x = 0; $x < $n; $x++) {
            $item = new Item;
            $item->filling_id = $gallons[0]->id;
            $item->active = false;
            $item->cost_price = 00000;
            $item->price = 7890;
            $item->save();
    }
//    return redirect()->back();
    return redirect('/production/batch/'.$id.'/fill');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $batch = Batch::find($id);
$packing = Packing::pluck('name');
        $fills = \DB::table('fillings')
            ->join('packings', 'packings.id', '=', 'fillings.packing_id')
            ->where('batch_id', '=', $id)
            ->select('fillings.*', 'packings.name', 'packings.weight AS pck_weight')
            ->get();
        $total_fill = 0;
        foreach ($fills as $fill){
            $total_fill += $fill->weight;
        }
        return view('Batch.Filling.create',compact('total_fill' , 'batch','packing'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id , Request $request)
    {
        $batch = Batch::find($id);
        $fills = \DB::table('fillings')
            ->join('packings', 'packings.id', '=', 'fillings.packing_id')
            ->where('batch_id', '=', $id)
            ->select('fillings.*', 'packings.name', 'packings.weight AS pck_weight')
            ->get();
        $total_fill = 0;
        foreach ($fills as $fill){
            $total_fill += $fill->weight;
        }
            $pack = Packing::find($request->packing + 1);
            $exist = \DB::table('fillings')->where('packing_id', '=', $pack->id)
                ->where('batch_id', '=', $id)->exists();
            if ($exist) {
                $fill = Filling::where('packing_id', '=', $pack->id)
                    ->where('batch_id', '=', $id)->get();
                $filler = $fill[0];
                $qty = $filler->qty + $request->qty;
                $batch_left = $batch->gross_weight - $total_fill - $batch->empty_weight;
                if($qty<$batch_left) {
                    $filler->qty = $qty;
                    $filler->weight = $qty * $pack->weight;
                    $filler->save();
                }
            }
            else {
                $fill = new Filling;
                $fill->packing_id = $pack->id;
                $fill->qty = $request->qty;
                $fill->weight = $request->qty * $pack->weight;
                $fill->unit = 'ltr';
                $fill->batch_id = $id;
                $fill->save();
            }
        return redirect('/production/batch/'.$id.'/fill');
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
    public function edit($id1,$id2)
    {
        $filling = Filling::find($id2);
        return view('Batch.Filling.update',compact('filling'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id1,$id2)
    {
        $filling = Filling::find($id2);
$packing = \DB::table('packings')->where('id','=',$filling->packing_id)->get();
        $filling->qty = $request->qty;
        $filling->weight = $packing[0]->weight * $request->qty;
        $filling->save();
        return redirect('/production/batch/'.$id1.'/fill');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id1,$id2)
    {
        Filling::find($id2)->delete();
        return redirect('/production/batch/'.$id1.'/fill');
    }
}