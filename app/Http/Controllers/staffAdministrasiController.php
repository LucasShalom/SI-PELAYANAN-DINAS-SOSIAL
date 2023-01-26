<?php

namespace App\Http\Controllers;

use App\Models\staffAdministrasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class staffAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = staffAdministrasi::all();
        return view('pages.administrasi.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.administrasi.create');
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
            'DATA_MASUK' => 'required',
            'DATA_KELUAR' => 'required',
        ]);

        staffAdministrasi::create([
            'DATA_MASUK' => $request->DATA_MASUK,
            'DATA_KELUAR' => $request->DATA_KELUAR,
        ]);

        return redirect('/dashboard/staffadmin');
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
        $admin = staffAdministrasi::find($id);
        return view('pages.administrasi.edit', compact('admin'));
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
            'DATA_MASUK' => 'required',
            'DATA_KELUAR' => 'required',
        ]);

        $admin = staffAdministrasi::find($id);

        $admin->update([
            'DATA_MASUK' => $request->DATA_MASUK,
            'DATA_KELUAR' => $request->DATA_KELUAR,
        ]);

        return redirect('/dashboard/staffadmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = staffAdministrasi::find($id);
        $admin->delete();
        return redirect('/dashboard/staffadmin');
    }

    public function cetak_pdf()
    {
        $admin = staffAdministrasi::all();
    
        $pdf = Pdf::loadview('pages.administrasi.cetak',['admin'=>$admin]);
        return $pdf->download('laporan-data.pdf');
    }
}
