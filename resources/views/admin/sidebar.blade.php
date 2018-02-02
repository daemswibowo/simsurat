<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Sidebar
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                @if (request()->user()->hak=='admin')
                <li role="presentation">
                    <a href="{{ url('/user') }}">Manajemen Pengguna</a>
                </li>
                @endif
                <li role="presentation">
                    <a href="{{ url('/surat') }}">Surat Masuk/Keluar</a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/surat/laporan') }}">Laporan Surat Masuk/Keluar</a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/disposisi') }}">Disposisi</a>
                </li>
            </ul>
        </div>
    </div>
</div>
