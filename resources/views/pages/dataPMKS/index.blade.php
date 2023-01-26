@extends('pages.main')

@push('css-libraries')
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}>
<link rel="stylesheet" href={{ asset("assets/module/datatables.net-select-bs4/css/select.bootstrap4.min.css") }}>
@endpush

@section('contents')
<section class="section">
  <div class="section-header">
    <h1>Purchase Order</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="">Dashboard</a></div>
      <div class="breadcrumb-item">Data Customer</div>
    </div>
  </div>
  
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body d-flex justify-content-between">
            <a href="/dashboard/dataPMKS/create" class="btn btn-primary"><i class="fas fa-plus"
                aria-hidden="true"></i> Tambah Data</a>
            <a href="/download/dataPMKS" class=" btn btn-dark"><i class="fas fa-file-pdf"
                aria-hidden="true"></i> Cetak PDF</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Order Date</th>
                    <th>Vendor</th>
                    <th>Asal</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($datapmks as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->customer->id }}</td>
                        <td>{{ $item->RIWAYAT_KEJADIAN }}</td>
                        <td>{{ $item->JENIS_KASUS }}</td>
                        <td>{{ $item->JUMLAH_ORANG }}</td>
                        <td>
                            <a href="/dashboard/dataPMKS/{{ $item->id }}/edit" class="btn btn-warning"><i class="fa fa-pen" aria-hidden="true"></i></a>
                            <form action="/dashboard/dataPMKS/{{ $item->id }}" method="POST"
                              class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-delete"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </form>
                          </td>
                      </tr>
                  @empty
                      
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('js-libraries')
<script src={{ asset("assets/module/datatables/media/js/jquery.dataTables.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}></script>
<script src={{ asset("assets/module/datatables.net-select-bs4/js/select.bootstrap4.min.js") }}></script>
@endpush

@push('js-page')
<script src={{ asset("assets/js/page/modules-datatables.js") }}></script>
@endpush