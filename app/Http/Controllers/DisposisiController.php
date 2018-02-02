<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Disposisi;
use App\Surat;
use Illuminate\Http\Request;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $surats = Surat::count();
        $perPage = 25;

        if (!empty($keyword)) {
            $disposisi = Disposisi::where('no_disposisi', 'LIKE', "%$keyword%")
                ->orWhere('no_agenda', 'LIKE', "%$keyword%")
                ->orWhere('surat_id', 'LIKE', "%$keyword%")
                ->orWhere('kepada', 'LIKE', "%$keyword%")
                ->orWhere('keterangan', 'LIKE', "%$keyword%")
                ->orWhere('tanggapan', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $disposisi = Disposisi::paginate($perPage);
        }

        return view('disposisi.index', compact('disposisi','surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $surats = $this->surats();
        return view('disposisi.create', compact('surats'));
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
        $request->validate([
            'no_disposisi' => 'required',
            'no_agenda' => 'required',
            'surat_id' => 'required',
            'kepada' => 'required',
            'keterangan' => 'required',
            'tanggapan' => 'required',
        ]);
        $requestData = array_add($request->all(), 'user_id', $request->user()->id);
        
        Disposisi::create($requestData);

        return redirect('disposisi')->with('flash_message', 'Disposisi added!');
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
        $disposisi = Disposisi::findOrFail($id);

        return view('disposisi.show', compact('disposisi'));
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
        $surats = $this->surats();
        $disposisi = Disposisi::findOrFail($id);

        return view('disposisi.edit', compact('disposisi','surats'));
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
        $request->validate([
            'no_disposisi' => 'required',
            'no_agenda' => 'required',
            'surat_id' => 'required',
            'kepada' => 'required',
            'keterangan' => 'required',
            'tanggapan' => 'required',
        ]);
        $requestData = $request->all();
        
        $disposisi = Disposisi::findOrFail($id);
        $disposisi->update($requestData);

        return redirect('disposisi')->with('flash_message', 'Disposisi updated!');
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
        Disposisi::destroy($id);

        return redirect('disposisi')->with('flash_message', 'Disposisi deleted!');
    }

    private function surats ()
    {
        return Surat::whereTipe('masuk')->pluck('no_surat','id');
    }
}