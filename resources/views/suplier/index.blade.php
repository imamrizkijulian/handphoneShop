@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <section class="content-header">
              <h1>Suplier</h1>
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
  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading"> 
          <center><h3 class="panel-title">Data Supplier</h3></center> 
      </div>
      <div class="box-body">          
            <hr>
                <table class="table">
                <tr class="success">
                  <th>Kode Suplier</th>
                  <th>Nama Suplier</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Opsional</th>
                  <th width="200px">Actions</th>
                </tr>

                @foreach ($suplier as $data)
                <tr>
                  <td>{{ $data->kode_suplier }}</td>
                  <td>{{ $data->nama_suplier }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->telepon }}</td>
                  <td>{{ $data->opsional }}</td>
                  <td>
                    <a class="btn btn-xs btn-primary" href="{{ route('suplier.edit', $data->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route'=>['suplier.destroy', $data->id], 'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $suplier->render() !!}
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-body">
          <center><h3>Buat Data Suplier</h3></center>
            {!! Form::open(['url' => route('suplier.store'), 'method' => 'post','files'=>'true','class'=>'form-horizontal']) !!} 
              @include('suplier.forms')
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
  
@endsection

