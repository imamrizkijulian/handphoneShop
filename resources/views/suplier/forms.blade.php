<div class="form-group{{ $errors->has('kode_suplier') ? ' has-error' : '' }}"> 
    {!! Form::label('kode_suplier', 'Kode Suplier', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8"> 
        {!! Form::text('kode_suplier', null, ['class' => 'form-control', 'placeholder' => 'kode suplier']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('nama_suplier') ? 'has-error' : '' !!}"> 
    {!! Form::label('nama_suplier', 'Nama Suplier', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8">
        {!! Form::text('nama_suplier', null, ['class'=>'form-control', 'placeholder' => 'nama suplier']) !!} 
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
    {!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
    {!! Form::textarea('alamat', null, ['class'=>'form-control', 'placeholder' => 'alamat']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('telepon') ? 'has-error' : '' !!}"> 
    {!! Form::label('telepon', 'Telepon', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8">
        {!! Form::text('telepon', null, ['class'=>'form-control', 'placeholder' => 'telepon']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('opsional') ? 'has-error' : '' !!}"> 
    {!! Form::label('opsional', 'Opsional', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8">
        {{ Form::select('opsional', array('Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'), null, 
        ['class' => 'form-control','placeholder' => 'Pilih...']) }}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div> 
</div>

<div class="form-group"> 
    <div class="col-md-8 col-md-offset-2"> 
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
    </div> 
</div>
