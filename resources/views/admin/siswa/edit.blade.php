@extends('layouts.admin')

@section('content')
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Data Siswa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('siswa.index') }}" class="btn btn-lg btn-neutral bg-warning">
                <i class="ni ni-bold-left text-white"></i> <span class="text-white">Lihat Data Siswa</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">

          <!-- Card header -->
          <div class="card-header border-0">
            <h1 class="text-center mb-0">Form Tambah Siswa</h1>
          </div>

          <!-- Card Body -->
          <div class="card-body">
            <form method="POST" action="{{ Route('siswa.update', $siswa->id) }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <input name="id" class="form-control" type="hidden" value="{{ $siswa->id }}">
                </div>
                <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Username</label>
                    <input name="name" class="form-control" type="text" value="{{ $siswa->name }}" placeholder="John Snow" id="example-text-input">
                </div>
                <div class="form-group">
                    <label for="example-email-input" class="form-control-label">Email</label>
                    <input name="email" class="form-control" type="email" value="{{ $siswa->email }}" placeholder="john@example.com" id="example-email-input">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1" class="form-control-label">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                      <option value="Pelajar" {{ ($siswa->status === 'Pelajar') ? "selected" : "" }}>Pelajar</option>
                      <option value="Mahasiswa" {{ ($siswa->status === 'Mahasiswa') ? "selected" : "" }}>Mahasiswa</option>
                      <option value="Pekerja" {{ ($siswa->status === 'Pekerja') ? "selected" : "" }}>Pekerja</option>
                      <option value="Lain" {{ ($siswa->status === 'Lain') ? "selected" : "" }}>Lain-lain</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="example-tel-input" class="form-control-label">Phone</label>
                    <input name="phone" class="form-control" type="tel" value="{{ $siswa->phone }}" placeholder="+62-..." id="example-tel-input">
                </div>
                <div class="form-group">
                    <label for="example-tel-input" class="form-control-label">Alamat</label>
                    <textarea name="address" class="form-control" cols="10" rows="5" placeholder="Jl. ...">{{ $siswa->address }}</textarea>
                </div>
                <button type="sumbit" class="btn btn-block btn-warning">Ubah</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</div>
@endsection
