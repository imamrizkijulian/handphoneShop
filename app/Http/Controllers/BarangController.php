<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder; 
use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder) 
    {
        if ($request->ajax()) 
            { 
                $barangs = Barang::all();

                return Datatables::of($barangs) 
                ->addColumn('action', function($barang){ 
                    return view('datatable._action', [ 
                        'model' => $barang, 
                        'form_url' => route('barang.destroy', $book->id), 
                        'edit_url' => route('barang.edit', $book->id), 
                        'confirm_message' => 'Yakin mau menghapus ' . $book->title . '?' 
                    ]);
                })->make(true); 
            }
       $html = $htmlBuilder
            ->addColumn(['data' => 'nama_barang', 'name'=>'nama_barang', 'title'=>'Nama Barang'])
            ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);


        return view('barang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
