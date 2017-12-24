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
                  <li class="active">Edit</li>
                </ol>
            </section>
          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-primary">
       <div class="panel-heading"> 
          <h2 class="panel-title">Edit Suplier</h2> 
       </div><hr>
          {!! Form::model($suplier, ['url' => route('suplier.update', $suplier->id), 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
            @include('suplier.forms')
          {!! Form::close() !!}
    </div>
          
@endsection

