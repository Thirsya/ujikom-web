@extends('layouts.template')

@section('content')
    <div class="content">
        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Arsip Surat</h2>
                <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan</p>
                <p>Catatan:</p>
                <ul>
                    <li>Gunakan file berformat PDF</li>
                </ul>
                <div class="card">
                    <div class="card-body">
                        <form id="suratForm" action="{{ route('surat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Nomor Surat<span class="text-danger">*</span></label>
                                <input type="text" id="no_surat" name="no_surat"
                                    class="form-control @error('no_surat') is-invalid @enderror"
                                    placeholder="Masukan Nomor Surat" autocomplete="off" value="{{ old('no_surat') }}">
                                @error('no_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control select2 @error('id_kategori') is-invalid @enderror"
                                    name="id_kategori" id="id_kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_kategori') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Judul<span class="text-danger">*</span></label>
                                <input type="text" id="judul" name="judul"
                                    class="form-control @error('judul') is-invalid @enderror" placeholder="Masukan Judul"
                                    autocomplete="off" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>File Surat (PDF)<span class="text-danger">*</span></label>
                                <input class="form-control @error('file_surat') is-invalid @enderror" type="file"
                                    id="formFile" name="file_surat" accept="application/pdf">
                                @error('file_surat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" id="submitButton">Simpan</button>
                        <a class="btn btn-secondary" id="cancelButton" href="#">Cancel</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('customScript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submitButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data akan disimpan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('suratForm').submit();
                }
            });
        });

        document.getElementById('cancelButton').addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan membatalkan perubahan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Kembali'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('surat.index') }}';
                }
            });
        });
    </script>
@endpush
