<?php

namespace App\Http\Controllers;

use App\Models\dataPmks;
use App\Models\serviceSosial;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class serviceSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosial = serviceSosial::all ();
        return view('pages.sosial.index', compact('sosial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $datapmks = dataPmks::all();
        return view('pages.sosial.create', compact('datapmks'));
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

        serviceSosial::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'umur' => $request->umur,
            'pmks_id' => $request->pmks_id,  
        ]);

        return redirect('/dashboard/sosial');
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
        $sosial = serviceSosial::find($id);
        return view('pages.sosial.edit', compact('datapmks', 'sosial'));
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

        $sosial = serviceSosial::find($id);
        $sosial->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'umur' => $request->umur,
            'pmks_id' => $request->pmks_id,  
        ]);

        return redirect('/dashboard/sosial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $sosial = serviceSosial::find($id);
       $sosial->delete();
       return redirect('/dashboard/sosial');
    }

    public function cetak_pdf()
    {
        $sosial = serviceSosial::all();

        $pdf = Pdf::loadview('pages.sosial.cetak',['sosial'=>$sosial]);
        return $pdf->download('laporan-servicesosial.pdf');
    }
}
