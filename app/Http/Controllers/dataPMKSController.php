<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\dataPmks;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class dataPMKSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapmks = dataPmks::all();
        return view('pages.dataPMKS.index', compact('datapmks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = customer::all();
        return view('pages.dataPMKS.create', compact('customer'));
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
            'customer_id' => 'required',
            'RIWAYAT_KEJADIAN' => 'required',
            'JENIS_KASUS' => 'required',
            'JUMLAH_ORANG' => 'required',

        ]);

        dataPmks::create([
            'customer_id' => $request->customer_id,
            'RIWAYAT_KEJADIAN' => $request->RIWAYAT_KEJADIAN,
            'JENIS_KASUS' => $request->JENIS_KASUS,
            'JUMLAH_ORANG' => $request->JUMLAH_ORANG
        ]);

        return redirect('/dashboard/dataPMKS');
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
        $datapmks = dataPmks::find($id);
        $customer = customer::all();
        return view('pages.dataPMKS.edit', compact('datapmks', 'customer'));
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
            'customer_id' => 'required',
            'RIWAYAT_KEJADIAN' => 'required',
            'JENIS_KASUS' => 'required',
            'JUMLAH_ORANG' => 'required',

        ]);
        $datapmks = dataPmks::find($id);
        $datapmks->update([
            'customer_id' => $request->customer_id,
            'RIWAYAT_KEJADIAN' => $request->RIWAYAT_KEJADIAN,
            'JENIS_KASUS' => $request->JENIS_KASUS,
            'JUMLAH_ORANG' => $request->JUMLAH_ORANG
        ]);

        return redirect('/dashboard/dataPMKS');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapmks = dataPmks::find($id);
        $datapmks->delete();
        return redirect('/dashboard/dataPMKS');
    }

    public function cetak_pdf()
    {
        $datapmks = dataPmks::all();
    
        $pdf = Pdf::loadview('pages.dataPMKS.cetak',['datapmks'=>$datapmks]);
        return $pdf->download('laporan-datapmks.pdf');
    }
}
