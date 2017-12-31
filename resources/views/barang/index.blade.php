@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <section class="content-header">
              <h1>Barang</h1>
                <ol class="breadcrumb">
                  <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
                  <!-- <li class="active">Dashboard</li> -->
                </ol>
            </section>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box box-primary">
            <center><h2>Buat Data Barang</h2></center><hr>
            {!! Form::open(['url' => route('barang.store'), 'method' => 'post','files'=>'true','class'=>'form-horizontal']) !!}
            @include('barang.forms')
            <!-- <div class="form-group">
            Select image to upload:
                <input type="file" name="gambar" id="fileToUpload" class="form-control">
                <input type="submit" value="Upload Image" name="submit">
            </div> -->
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    @if($message = Session::get('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h3>{{ $message }}</h3>
      </div>
    @endif

    <!-- Main content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <h3>Data Barang</h3>
            <div class="box-body">
                <table class="table table-bordered">
                <tr class="success">
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Stok</th>
                  <th>Satuan</th>
                  <th>Status</th>
                  <th>Nama Supplier</th>
                  <th width="200px">Actions</th>
                </tr>

                @foreach ($barang as $data)
                <tr>
                  <td>{{ $data->kode_barang }}</td>
                  <td>{{ $data->nama_barang }}</td>
                  <td>{{ $data->harga_jual }}</td>
                  <td>{{ $data->harga_beli }}</td>
                  <td>{{ $data->stok }}</td>
                  <td>{{ $data->satuan }}</td>
                  <td>{{ $data->status }}</td>
                  <td>{{ $data->suplier->nama_suplier }}</td>
                  <td>
                    <a class="btn btn-xs btn-success" href="{{ route('barang.show', $data->id) }}">Detail</a>
                    <a class="btn btn-xs btn-primary" href="{{ route('barang.edit', $data->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route'=>['barang.destroy', $data->id], 'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $barang->render() !!}
        </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- /.content -->
@endsection
