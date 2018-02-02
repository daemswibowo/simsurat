<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\JenisSurat;
use Illuminate\Http\Request;

class JenisSuratController extends Controller
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
            $jenissurat = JenisSurat::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $jenissurat = JenisSurat::paginate($perPage);
        }

        return view('jenis-surat.index', compact('jenissurat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('jenis-surat.create');
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
        
        $requestData = $request->all();
        
        JenisSurat::create($requestData);

        return redirect('jenis-surat')->with('flash_message', 'JenisSurat added!');
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
        $jenissurat = JenisSurat::findOrFail($id);

        return view('jenis-surat.show', compact('jenissurat'));
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
        $jenissurat = JenisSurat::findOrFail($id);

        return view('jenis-surat.edit', compact('jenissurat'));
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
        
        $requestData = $request->all();
        
        $jenissurat = JenisSurat::findOrFail($id);
        $jenissurat->update($requestData);

        return redirect('jenis-surat')->with('flash_message', 'JenisSurat updated!');
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
        JenisSurat::destroy($id);

        return redirect('jenis-surat')->with('flash_message', 'JenisSurat deleted!');
    }
}