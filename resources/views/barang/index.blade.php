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

    <!-- Main content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div>
              <p> <a class="btn btn-primary" href="{{ url('/admin/barang/create') }}">Tambah</a> </p>
            </div>
          {!! $html->table(['class'=>'table-striped']) !!} 
          </div>
        </div>
      </div>
    </div> 
    <!-- /.content -->
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection