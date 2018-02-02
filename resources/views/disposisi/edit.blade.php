@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Disposisi #{{ $disposisi->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {!! Form::model($disposisi, [
                            'method' => 'PATCH',
                            'url' => ['/disposisi', $disposisi->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('disposisi.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
