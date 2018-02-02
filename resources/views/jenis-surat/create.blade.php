@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New JenisSurat</div>
                    <div class="panel-body">
                        <a href="{{ url('/jenis-surat') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        

                        {!! Form::open(['url' => '/jenis-surat', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('jenis-surat.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
