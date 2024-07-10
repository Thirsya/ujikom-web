@extends('layouts.template')

@section('content')
    <div class="content">
        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Kategori Surat</h2>
                <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <form id="kategoriForm" action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nomor (Auto Increment)</label>
                                <input type="text" id="kategori" name="kategori"
                                    class="form-control @error('kategori') is-invalid @enderror"
                                    placeholder="Masukan kategori" autocomplete="off" value="{{ $lastId }}" disabled>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Kategori<span class="text-danger">*</span></label>
                                <input type="text" id="nama_kategori" name="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                    placeholder="Masukan Kategori" autocomplete="off">
                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan<span class="text-danger">*</span></label>
                                <textarea id="keterangan" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                    placeholder="Masukan Keterangan" autocomplete="off"></textarea>
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <button type="button" id="simpanButton" class="btn btn-primary">Simpan</button>
                                <a class="btn btn-secondary" id="cancelButton" href="#">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('customScript')
    <script>
        document.getElementById('simpanButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('kategoriForm').submit();
                }
            })
        });

        document.getElementById('cancelButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan membatalkan perubahan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, batalkan!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('kategori.index') }}';
                }
            })
        });
    </script>
@endpush
