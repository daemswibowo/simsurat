@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Disposisi {{ $disposisi->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/disposisi') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/disposisi/' . $disposisi->id . '/edit') }}" title="Edit Disposisi"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['disposisi', $disposisi->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Disposisi',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}

                        <button class="btn btn-default pull-right cetak"><i class="fa fa-print"></i> Cetak</button>
                        <br/>
                        <br/>

                        <div id="cetak">
                            <h1 class="text-center">KARTU DISPOSISI</h1>
                            <table width="100%">
                                <tr>
                                    <td width="200">No. Disposisi</td>
                                    <td width="1">:</td>
                                    <td> &nbsp;{{ $disposisi->no_agenda }}</td>
                                </tr>
                                <tr>
                                    <td width="200">No. Agenda</td>
                                    <td width="1">:</td>
                                    <td> &nbsp;{{ $disposisi->no_agenda }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Tanggal Penyelesaian</td>
                                    <td width="1">:</td>
                                    <td> &nbsp; .........................................</td>
                                </tr>
                            </table>
                            <hr width="100%">
                            <table width="100%">
                                <tr>
                                    <td width="200">Surat Dari</td>
                                    <td width="1">:</td>
                                    <td> &nbsp; {{ $disposisi->surat->pengirim }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Tanggal Surat</td>
                                    <td width="1">:</td>
                                    <td> &nbsp;{{ Carbon\Carbon::parse($disposisi->surat->tanggal_kirim)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td width="200">No. Surat</td>
                                    <td width="1">:</td>
                                    <td> &nbsp; {{ $disposisi->surat->no_surat }}</td>
                                </tr>
                                <tr>
                                    <td width="200">Perihal</td>
                                    <td width="1">:</td>
                                    <td> &nbsp; {{ $disposisi->surat->perihal }}</td>
                                </tr>
                            </table>
                            <br>
                            <table width="100%" border="1" style="border-collapse: collapse;">
                                <tr>
                                    <td style="padding: 10px;" valign="top">
                                        <p><b>Keterangan:</b></p>
                                        <p>
                                            {{ $disposisi->keterangan }}
                                        </p>
                                        <p><b>Tanggapan:</b></p>
                                        <p>
                                            {{ $disposisi->tanggapan }}
                                        </p>
                                    </td>
                                    <td style="padding: 10px;" valign="top">
                                        <p><b>Diteruskan Kepada</b></p>
                                        <p>{{ $disposisi->kepada }}</p>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table width="100%">
                                <tr>
                                    <td width="50%"></td>
                                    <td  width="50%" align="center">
                                        <p>Gorontalo, ................................................................</p>
                                        <p><b>Kepala</b></p>

                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <u><b>.................................................................</b></u>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.cetak').click(function () {
            $('#cetak').print();
        })
    </script>
@endsection