@extends('layouts.template')

@section('content')
    <div class="content">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <div class="card-header">
                    <h2 class="card-title">KATEGORI SURAT</h2>
                    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>
                    <p>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
                </div>
                <div class="input-group mb-3">
                    <form class="form-inline" action="{{ route('kategori.index') }}" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                            aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>

                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @foreach ($kategori as $key => $listKategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $listKategori->nama_kategori }}</td>
                            <td>{{ $listKategori->keterangan }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('kategori.edit', $listKategori->id) }}" type="button"
                                        class="btn btn-warning" style="margin-right: 10px">Edit</a>
                                    <form action="{{ route('kategori.destroy', $listKategori->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div><br>
                <a href="{{ route('kategori.create') }}" type="button" class="btn btn-outline-dark">+
                    Tambah Kategori Baru</a>
            </div>
        </div>
    </div>
    @include('layouts.alert')
@endsection

@push('customScript')
    <script>
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.delete-form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus dan tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
