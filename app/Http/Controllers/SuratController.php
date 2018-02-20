<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\JenisSurat;
use App\Surat;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $surat = Surat::where('no_surat', 'LIKE', "%$keyword%")
                ->orWhere('no_agenda', 'LIKE', "%$keyword%")
                ->orWhere('jenis_surat_id', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_kirim', 'LIKE', "%$keyword%")
                ->orWhere('tanggal_terima', 'LIKE', "%$keyword%")
                ->orWhere('pengirim', 'LIKE', "%$keyword%")
                ->orWhere('perihal', 'LIKE', "%$keyword%")
                ->orWhere('tipe', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $surat = Surat::paginate($perPage);
        }

        return view('surat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $jenisSurats = JenisSurat::pluck('name','id');
        return view('surat.create', compact('jenisSurats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validation = [
            'no_surat' => 'required',
            'jenis_surat_id' => 'required',
            'tanggal_kirim' => 'required',
            'tipe' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'scan' => 'required|file|max:2048'
        ];

        if ($request->tipe == 'masuk') {
            $validation = array_add($validation, 'tanggal_terima', 'required');
        }

        $request->validate($validation);
        $file = $request->file('scan');
        $path = $file->store('public/files');

        $requestData = [
            'no_surat' => $request->no_surat,
            'jenis_surat_id' => $request->jenis_surat_id,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_terima' => $request->tanggal_terima,
            'tipe' => $request->tipe,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'scan' => $path,
            'user_id' => $request->user()->id,
            'no_agenda' => Surat::whereTipe($request->tipe)->count()+1
        ];

        Surat::create($requestData);

        return redirect('surat')->with('flash_message', 'Surat added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.show', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $jenisSurats = JenisSurat::pluck('name','id');

        return view('surat.edit', compact('surat','jenisSurats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
       
        $validation = [
            'no_surat' => 'required',
            'jenis_surat_id' => 'required',
            'tanggal_kirim' => 'required',
            'tipe' => 'required',
            'pengirim' => 'required',
            'perihal' => 'required',
            'scan' => 'file|max:2048'
        ];

        if ($request->tipe == 'masuk') {
            $validation = array_add($validation, 'tanggal_terima', 'required');
        }


        $surat = Surat::findOrFail($id);
        
        $requestData = [
            'no_surat' => $request->no_surat,
            'jenis_surat_id' => $request->jenis_surat_id,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_terima' => $request->tanggal_terima,
            'tipe' => $request->tipe,
            'pengirim' => $request->pengirim,
            'perihal' => $request->perihal,
            'user_id' => $request->user()->id,
        ];

        if ($request->hasFile('scan')) {
            $file = $request->file('scan');
            $path = $file->store('public/files');
            $requestData = array_add($requestData, 'scan', $path);
            \Storage::delete($surat->scan);
        }
        $request->validate($validation);
        $surat->update($requestData);

        return redirect('surat')->with('flash_message', 'Surat updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        \Storage::delete($surat->scan);
        $surat->delete();
        return redirect('surat')->with('flash_message', 'Surat deleted!');
    }

    public function laporan (Request $request)
    {   
        $from = \Carbon\Carbon::now();
        $to = \Carbon\Carbon::now();
        $tipe = 'masuk';
        if ($request->from && $request->to && $request->tipe) {
            $from = $request->from;
            $to = $request->to;
            $tipe = $request->tipe;
        }

        $surats = Surat::whereTipe($tipe)-> whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->get();

        return view('surat.laporan', compact('surats','from','to','tipe'));
    }
}