@extends('pages.main')


@section('contents')
<section class="section">
    <div class="section-header">
        <h1>Edit Form Product</h1>
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
                <form action="/dashboard/staffadmin/{{ $admin->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                    <label for="DATA_MASUK">DATA MASUK</label>
                    <input type="date" class="form-control" id="DATA_MASUK" name="DATA_MASUK" value="{{ $admin->DATA_MASUK }}" required>
                    @error('DATA_MASUK')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="DATA_KELUAR">DATA KELUAR</label>
                    <input type="date" class="form-control" id="DATA_KELUAR" name="DATA_KELUAR" value="{{ $admin->DATA_KELUAR }}" required>
                    @error('DATA_KELUAR')
                    <p class="text-danger">
                      {{ $message }}
                    </p>
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