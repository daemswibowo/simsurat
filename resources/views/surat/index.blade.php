@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Surat</div>
                    <div class="panel-body">
                        <a href="{{ url('/surat/create') }}" class="btn btn-success btn-sm" title="Add New Surat">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/surat', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Surat</th>
                                        <th>No Agenda</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanggal Kirim</th>
                                        <th>Tanggal Terima</th>
                                        <th>Pengirim</th>
                                        <th>Perihal</th>
                                        <th>Tipe</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($surat as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->no_surat }}</td>
                                        <td>{{ $item->no_agenda }}</td>
                                        <td>{{ $item->jenis_surat->name }}</td>
                                        <td>{{ $item->tanggal_kirim }}</td>
                                        <td>{{ $item->tanggal_terima }}</td>
                                        <td>{{ $item->pengirim }}</td>
                                        <td>{{ $item->perihal }}</td>
                                        <td>Surat {{ $item->tipe }}</td>
                                        <td>
                                            <a href="{{ url('/surat/' . $item->id . '/edit') }}" title="Edit Surat"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/surat', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Surat',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $surat->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
