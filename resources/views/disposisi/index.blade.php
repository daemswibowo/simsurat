@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Disposisi</div>
                    <div class="panel-body">
                        @if ($surats>0)
                        <a href="{{ url('/disposisi/create') }}" class="btn btn-success btn-sm" title="Add New Disposisi">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/disposisi', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>No Disposisi</th><th>No Agenda</th><th>No. Surat</th><th>Kepada</th><th>Keterangan</th><th>Tanggapan</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($disposisi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->no_disposisi }}</td>
                                        <td>{{ $item->no_agenda }}</td>
                                        <td>{{ $item->surat->no_surat }}</td>
                                        <td>{{ $item->kepada }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->tanggapan }}</td>
                                        <td>
                                            <a href="{{ url('/disposisi/' . $item->id) }}" title="Cetak Disposisi"><button class="btn btn-default btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <i class="fa fa-print"></i> Cetak</button></a>
                                            <a href="{{ url('/disposisi/' . $item->id . '/edit') }}" title="Edit Disposisi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/disposisi', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Disposisi',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $disposisi->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        @else
                        <p class="lead text-center">Belum ada surat masuk</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
