<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parkir;
use DB;

class ParkirController extends Controller
{
    public function index()
    {
        //$parks = park::all();
        //$parks = DB::table('park')->paginate(2);
        $parks = parkir::paginate(2);
        
        return view('park.index',['parks' => $parks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('park.create');
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
           'plat' => 'required', 'foto' => 'required', 
        ]);
        
        $park = new parkir;
        $park->plat = $request->plat;
        $park->foto = $request->foto;
        $park->slug = str_slug($request->plat, '-');
        $park->save();
        return redirect('park')->with('pesan', 'post created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($plat)
    {
        /*$park = park::find($id);*/
        $park = parkir::where('slug',$plat)->first();
        
        if(!$park){
            abort(404);
        }
        
        return view('park.single')->with('park', $park);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $park = parkir::find($id);
        
        if(!$park){
            abort(404);
        }
        
        return view('park.edit')->with('park', $park);
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
        $this->validate($request, [
           'plat' => 'required', 'foto' => 'required', 
        ]);
        
        $park = parkir::find($id);
        $park->plat = $request->plat;
        $park->foto = $request->foto;
        $park->slug = str_slug($request->plat, '-');
        $park->save();
        return redirect('park')->with('pesan', 'post edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $park = parkir::find($id);
        $park->delete();
        return redirect('park')->with('pesan', 'post deleted!');
    }
}
