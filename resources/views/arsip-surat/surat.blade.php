@extends('layouts.template')

@section('content')
    <div class="content">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <div class="card-header">
                    <h2 class="card-title"> ARSIP SURAT</h2>
                    <t>Berikut ini adalah surat-surat tang telah terbit dan diarsipkan.</t><br>
                    <t>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</t>
                </div>
                <div class="input-group mb-3">
                    <form class="form-inline" action="{{ route('surat.index') }}" method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search"
                            aria-label="Search" value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
                <tbody>
                    <tr>
                        <th>#</th>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsiapan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    @foreach ($surat as $key => $listSurat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $listSurat->no_surat }}</td>
                            <td>{{ $listSurat->kategori->nama_kategori }}</td>
                            <td>{{ $listSurat->judul }}</td>
                            <td>{{ $listSurat->waktu }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center">
                                    <form action="{{ route('surat.destroy', $listSurat->id) }}" method="POST"
                                        style="display: inline" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                    <a href="{{ route('surat.download', $listSurat->id) }}" type="button"
                                        class="btn btn-success" style="margin-left: 10px">Unduh</a>
                                    <a href="{{ route('surat.edit', $listSurat->id) }}" type="button" class="btn btn-info"
                                        style="margin-left: 10px">Lihat >></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>
            <div>
                <a href="{{ route('surat.create') }}"type="button" class="btn btn-outline-dark">Arsipkan Surat</a>
            </div>
        </div>
    </div>
    @include('layouts.alert')
@endsection
@push('customScript')
    <script>
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus arsip surat ini?",
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
