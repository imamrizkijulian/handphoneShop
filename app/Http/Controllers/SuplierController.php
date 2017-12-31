<?php

namespace App\Http\Controllers;

use App\Suplier;
use Illuminate\Http\Request;
// use Yajra\Datatables\Html\Builder; 
use Yajra\Datatables\Datatables;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        $suplier = Suplier::latest()->paginate(10);
        return view('suplier.index', compact('suplier'));

       //  if ($request->ajax()) 
       //      { 
       //          $supliers = Suplier::all();

       //          return Datatables::of($supliers)
       //          ->addColumn('action', function($book){ 
       //              return view('datatable._action', [ 
       //                  'model' => $suplier,
       //                  'form_url' => route('suplier.destroy', $suplier->id), 
       //                  'edit_url' => route('suplier.edit', $suplier->id), 
       //                  'confirm_message' => 'Yakin mau menghapus ' . $suplier->title . '?' 
       //              ]);
       //          })->make(true); 
       //      }
       // $html = $htmlBuilder
       //      ->addColumn(['data' => 'kode_suplier', 'name'=>'kode_suplier', 'title'=>'Kode Suplier'])
       //      ->addColumn(['data' => 'nama_suplier', 'name'=>'nama_suplier', 'title'=>'Nama Suplier'])
       //      ->addColumn(['data' => 'alamat', 'name'=>'alamat', 'title'=>'Alamat'])
       //      ->addColumn(['data' => 'telepon', 'name'=>'telepon', 'title'=>'Telepon'])
       //      ->addColumn(['data' => 'opsional', 'name'=>'opsional', 'title'=>'Opsional'])
       //      ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Actions', 'orderable'=>false, 'searchable'=>false]);


       //  return view('suplier.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suplier.index');
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
            'kode_suplier'   => 'required',
            'nama_suplier'   => 'required',
            'alamat'         => 'required',
            'telepon'        => 'required',
            'opsional'       => 'required',
        ]);
        Suplier::create($request->only('kode_suplier','nama_suplier','alamat','telepon','opsional'));
        return redirect()->route('suplier.index')->with('success','Berhasil membuat data suplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = Suplier::find($id);
        return view('suplier.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kode_suplier'   => 'required',
            'nama_suplier'   => 'required',
            'alamat'         => 'required',
            'telepon'        => 'required',
            'opsional'       => 'required',
        ]);
        Suplier::find($id)->update($request->all());
        return redirect()->route('suplier.index')->with('success','Berhasil mengubah data suplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Suplier::find($id)->delete();
        return redirect()->route('suplier.index')->with('success','Berhasil menghapus data Suplier');
    }
}
