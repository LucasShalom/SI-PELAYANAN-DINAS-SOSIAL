@extends('pages.main')


@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Tambah Data User</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Data User</a></div>
          <div class="breadcrumb-item active">Tambah Data</div>
        </div>
      </div>
      
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form action="/dashboard/dataPMKS/{{ $datapmks->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="customer_id">ID CUSTOMERS</label>
                    <select name="customer_id" required class="form-control">
                      @foreach($customer as $item)
                      @if ($item->customer_id == $datapmks->id)
                      <option value="{{ $item->id }}" selected>{{ $item->id }}</option>
                      @else
                      <option value="{{ $item->id }}">{{ $item->id }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="RIWAYAT_KEJADIAN">RIWAYAT KEJADIAN</label>
                    <input type="text" class="form-control" id="RIWAYAT_KEJADIAN" name="RIWAYAT_KEJADIAN" required value="{{ $datapmks->RIWAYAT_KEJADIAN }}">
                    @error('RIWAYAT_KEJADIAN')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="JENIS_KASUS">JENIS KASUS</label>
                    <input type="text" class="form-control" id="JENIS_KASUS" name="JENIS_KASUS" required value="{{ $datapmks->JENIS_KASUS }}">
                    @error('JENIS_KASUS')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="JUMLAH_ORANG">JUMLAH ORANG</label>
                    <input type="text" class="form-control" id="JUMLAH_ORANG" name="JUMLAH_ORANG" required value="{{ $datapmks->JUMLAH_ORANG }}">
                    @error('JUMLAH_ORANG')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
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