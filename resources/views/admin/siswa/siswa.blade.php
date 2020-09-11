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
                <li class="breadcrumb-item active" aria-current="page">Master Siswa</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('siswa.create') }}" class="btn btn-lg btn-neutral bg-success">
                <i class="ni ni-fat-add text-white"></i> <span class="text-white">Data Siswa</span>
            </a>
          </div>
          <div class="col-lg">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Berhasil!</strong> {{ $message }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
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
            <h3 class="mb-0">Data Siswa</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th scope="col" class="sort">Name</th>
                  <th scope="col" class="sort">Email</th>
                  <th scope="col" class="sort">No. Telepon</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="sort">Alamat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="list">
                    @forelse ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <form action="{{ route('siswa.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Edit Siswa">
                                    Edit
                                </a>
                                <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Hapus Siswa" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">Maaf Tidak Ada Data Siswa !!!</td>
                    </tr>
                    @endforelse
              </tbody>
            </table>
          </div>

          <!-- Card footer & Custom Pagination -->
          <div class="card-footer py-4">
            {{-- <nav aria-label="...">
              <ul class="pagination justify-content-end mb-0">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-angle-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">
                    <i class="fas fa-angle-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav> --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Footer -->
    @include('layouts.footer')
</div>
@endsection
