<div class="form-group{{ $errors->has('kode_barang') ? ' has-error' : '' }}"> 
    {!! Form::label('kode_barang', 'Kode Barang', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6"> 
        {!! Form::text('kode_barang', null, ['class' => 'form-control', 'placeholder' => 'kode barang']) !!}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('nama_barang') ? 'has-error' : '' !!}"> 
    {!! Form::label('nama_barang', 'Nama Barang', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        {!! Form::text('nama_barang', null, ['class'=>'form-control', 'placeholder' => 'nama barang']) !!} 
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group required {!! $errors->has('harga_jual') ? 'has-error' : '' !!}">
    {!! Form::label('harga_jual', 'Harga Jual', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon">Rp</span>
            {!! Form::text('harga_jual', null, ['class'=>'form-control text-right', 'placeholder' => 'harga jual']) !!} 
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group required {!! $errors->has('harga_beli') ? 'has-error' : '' !!}">
    {!! Form::label('harga_beli', 'Harga Beli', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon">Rp</span>
            {!! Form::text('harga_beli', null, ['class'=>'form-control text-right', 'placeholder' => 'harga beli']) !!} 
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {!! $errors->has('stok') ? 'has-error' : '' !!}"> 
    {!! Form::label('stok', 'Stok', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        {!! Form::text('stok', null, ['class'=>'form-control', 'placeholder' => 'stok']) !!} 
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('satuan') ? 'has-error' : '' !!}"> 
    {!! Form::label('satuan', 'Satuan', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        {{ Form::select('satuan', array('Pcs' => 'Pcs', 'Box' => 'Box'), null, 
        ['class' => 'form-control','placeholder' => 'Pilih...']) }}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div> 
</div>

<div class="form-group {!! $errors->has('status') ? 'has-error' : '' !!}"> 
    {!! Form::label('status', 'status', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        {{ Form::select('status', array('Baru' => 'Baru', 'Second' => 'Second'), null, 
        ['class' => 'form-control','placeholder' => 'Pilih...']) }}
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div> 
</div>

<div class="form-group {!! $errors->has('gambar') ? 'has-error' : '' !!}"> 
    {!! Form::label('gambar', 'Gambar', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        <input type="file" name="gambar" id="fileToUpload">
    </div> 
</div>

<div class="form-group {!! $errors->has('suplier_id') ? 'has-error' : '' !!}"> 
    {!! Form::label('suplier_id', 'Nama Suplier', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-6">
        {!! Form::select('suplier_id', array('' => 'Pilih Suplier')+App\Suplier::pluck('nama_suplier','id')->all(), null, ['class' => 'form-control']) !!} {!! $errors->first('suplier_id', '<p class="help-block">:message</p>') !!}
    </div> 
</div>

<div class="form-group"> 
    <div class="col-md-8 col-md-offset-2"> 
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} <hr>
    </div> 
</div>
