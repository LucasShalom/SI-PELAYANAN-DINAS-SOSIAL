<?php

namespace App\Http\Controllers;

use App\Models\dataPmks;
use App\Models\serviceKejiwaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class serviceKejiwaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jiwa = serviceKejiwaan::all();
        return view('pages.jiwa.index', compact('jiwa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapmks = dataPmks::all();
        return view('pages.jiwa.create', compact('datapmks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'umur' => 'required',
            'pmks_id' => 'required',

        ]);

        serviceKejiwaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'umur' => $request->umur,
            'pmks_id' => $request->pmks_id,
        ]);

        return redirect('/dashboard/jiwa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datapmks = dataPmks::all();
        $jiwa = serviceKejiwaan::find($id);
        return view('pages.jiwa.edit', compact('datapmks', 'jiwa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'alamat' => 'required',
            'status' => 'required',
            'umur' => 'required',
            'pmks_id' => 'required',

        ]);
        $jiwa = serviceKejiwaan::find($id);
        $jiwa->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'umur' => $request->umur,
            'pmks_id' => $request->pmks_id,
        ]);

        return redirect('/dashboard/jiwa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jiwa = serviceKejiwaan::find($id);
        $jiwa->delete();
        return redirect('/dashboard/jiwa');
    }

    public function cetak_pdf()
    {
        $jiwa = serviceKejiwaan::all();
    
        $pdf = Pdf::loadview('pages.jiwa.cetak',['jiwa'=>$jiwa]);
        return $pdf->download('laporan-servicekejiwaan.pdf');
    }
}
