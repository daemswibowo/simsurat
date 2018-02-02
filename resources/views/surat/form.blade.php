@if(isset($submitButtonText))
    {!! Form::hidden('tipe', null) !!}
    <div class="form-group {{ $errors->has('tipe') ? 'has-error' : ''}}">
        {!! Form::label('tipe', 'Tipe', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('tipe', "Surat $surat->tipe" , ['disabled'=>'disabled','class'=>'form-control']) !!}
        </div>
    </div>
@else
    <div class="form-group {{ $errors->has('tipe') ? 'has-error' : ''}}">
        {!! Form::label('tipe', 'Tipe', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::select('tipe', ['masuk'=>'Surat masuk', 'keluar'=>'Surat keluar'], null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control tipe']) !!}
            {!! $errors->first('tipe', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
@endif
<div class="form-group {{ $errors->has('no_surat') ? 'has-error' : ''}}">
    {!! Form::label('no_surat', 'No Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('no_surat', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('no_surat', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('jenis_surat_id') ? 'has-error' : ''}}">
    {!! Form::label('jenis_surat_id', 'Jenis Surat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('jenis_surat_id', $jenisSurats, null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}

        {!! $errors->first('jenis_surat_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('tanggal_kirim') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_kirim', 'Tanggal Kirim', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal_kirim', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('tanggal_kirim', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group tglTerima {{ $errors->has('tanggal_terima') ? 'has-error' : ''}}">
    {!! Form::label('tanggal_terima', 'Tanggal Terima', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal_terima', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('tanggal_terima', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('pengirim') ? 'has-error' : ''}}">
    {!! Form::label('pengirim', 'Pengirim', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('pengirim', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('pengirim', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('perihal') ? 'has-error' : ''}}">
    {!! Form::label('perihal', 'Perihal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('perihal', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('perihal', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
