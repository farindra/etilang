<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Violation;
// use Auth;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Violation::orderBy('id','desc')->paginate(10);
        return view('violations.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('violations.create');
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
        $violation = new Violation();
        $violation->violator_identity_number = $request->violator_identity_number;
        $violation->violator_name = $request->violator_name;
        $violation->officer_id = $request->user()->id ;//$request->officer_id;
        // $violation->officer_id = Auth::user()->id ;//$request->officer_id;
        $violation->status = 'new' ;//$request->status;
        $violation->save();
        return redirect()->route('violations.index');
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
        // $items = Violation::find($id);
        $violation = Violation::find($id);
        return view('violations.edit',['violation' => $violation]);
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
        $violation = Violation::find($id);
        $violation->violator_identity_number = $request->violator_identity_number;
        $violation->violator_name = $request->violator_name;
        $violation->save();

        return redirect()->route('violations.index')->with('status' , "Data Pelanggaran ID-".$id." Berhasil diupdate.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $violation = Violation::find($id);
        $violation->delete();

        return redirect()->route('violations.index')->with('status' , "Data Pelanggaran ID-".$id." Berhasil dihapus.");
    }
}
