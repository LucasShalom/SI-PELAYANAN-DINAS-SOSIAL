<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\staffAdministrasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        return view('pages.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = staffAdministrasi::all();
        return view('pages.customer.create', compact('admin'));
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
            'staffadministrasi_id' => 'required',
            'JENIS_KASUS' => 'required',
        ]);

        customer::create([
            'staffadministrasi_id' => $request->staffadministrasi_id,
            'JENIS_KASUS' => $request->JENIS_KASUS,
        ]);

        return redirect('/dashboard/customer');
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
        $customer = customer::find($id);
        $admin = staffAdministrasi::all();
        return view('pages.customer.edit', compact('admin', 'customer'));
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
            'staffadministrasi_id' => 'required',
            'JENIS_KASUS' => 'required',
        ]);

        $customer = customer::find($id);

        $customer->update([
            'staffadministrasi_id' => $request->staffadministrasi_id,
            'JENIS_KASUS' => $request->JENIS_KASUS,
        ]);

        return redirect('/dashboard/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();
        return redirect('/dashboard/customer');
    }

    public function cetak_pdf()
    {
        $customer = customer::all();
    
        $pdf = Pdf::loadview('pages.customer.cetak',['customer'=>$customer]);
        return $pdf->download('laporan-customer.pdf');
    }
}
