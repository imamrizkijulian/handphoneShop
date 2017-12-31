<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
// use Yajra\Datatables\Html\Builder; 
// use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $barang = Barang::latest()->paginate(5);
        return view('barang.index', compact('barang'));

       //  if ($request->ajax()) 
       //      { 
       //          $barangs = Barang::all();

       //          return Datatables::of($barangs) 
       //          ->addColumn('action', function($barang){ 
       //              return view('datatable._action', [ 
       //                  'model' => $barang, 
       //                  'form_url' => route('barang.destroy', $book->id), 
       //                  'edit_url' => route('barang.edit', $book->id), 
       //                  'confirm_message' => 'Yakin mau menghapus ' . $book->title . '?' 
       //              ]);
       //          })->make(true); 
       //      }
       // $html = $htmlBuilder
       //      ->addColumn(['data' => 'kode_barang', 'name'=>'kode_barang', 'title'=>'Kode Barang'])
       //      ->addColumn(['data' => 'nama_barang', 'name'=>'nama_barang', 'title'=>'Nama Barang'])
       //      ->addColumn(['data' => 'harga_jual', 'name'=>'harga_jual', 'title'=>'Harga Jual'])
       //      ->addColumn(['data' => 'harga_beli', 'name'=>'harga_beli', 'title'=>'Harga Beli'])
       //      ->addColumn(['data' => 'stok', 'name'=>'stok', 'title'=>'Stok'])
       //      ->addColumn(['data' => 'satuan', 'name'=>'satuan', 'title'=>'Satuan'])
       //      ->addColumn(['data' => 'status', 'name'=>'status', 'title'=>'Status'])
       //      ->addColumn(['data' => 'nama_suplier', 'name'=>'nama_suplier', 'title'=>'Nama Suplier'])
       //      ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);


       //  return view('barang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::create($request->except('gambar'));

        // Isi field cover jika ada cover yang diupload
        if ($request->hasFile('gambar')) {
            // Mengambil file yang diupload
            $uploaded_cover = $request->file('gambar');

            // Mengambil extension file
            $extension = $uploaded_cover->getClientOriginalExtension();

            // Membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // Menyimpan cover ke folder public/img
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_cover->move($destinationPath, $filename);

            // Mengisi field cover di book dengan filename yang harus dibuat
            $barang->gambar = $filename;
            $barang->save();
        }

        return redirect()->route('barang.index')->with('success','Berhasil membuat data barang');
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
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit')->with(compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [ 
            'kode_barang' => 'required', 
            'nama_barang' => 'required', 
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
            'stok' => 'required|numeric',
            'satuan' => 'required',
            'status' => 'required',
            'gambar' => 'image|max:2048',
            'nama_suplier' => 'required', ]);
        $barang = Barang::find($id); $barang->update($request->all());

        if (!$barang->update($request->all())) return redirect()->back();

        // Isi field cover jika ada cover yang diupload
        if ($request->hasFile('gambar')) {
            // Mengambil file yang diupload berikut eksistensinya
            $filename = null; 
            $uploaded_cover = $request->file('gambar'); 
            $extension = $uploaded_cover->getClientOriginalExtension();


            // Mengambil extension file
            $filename = md5(time()) . '.' . $extension; 
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';


            // Membuat nama file random berikut extension
            $filename = md5(time()) . '.' . $extension;

            // memindahkan file ke folder public/img 
            $uploaded_cover->move($destinationPath, $filename);


            // Hapus gambar lama, jika ada
            if ($barang->gambar) {
                $old_cover = $barang->gambar;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'img' 
                . DIRECTORY_SEPARATOR . $barang->gambar;

                try {
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    // File sudah dihapus / tidak ada
                }
            }

            // Ganti field gambar dengan gambar yang baru
            $barang->gambar = $filename;
            $barang->save();
        }
        return redirect()->route('barang.index');
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
