@extends('template')
@section('content')

<div class="content">
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Arsip Surat</h2>
            <t>Unggah surat yang telah terbit pada form ini untuk diarsipkan</t><br>
            <t>Catatan</t><br>
            <t> - Gunakan file berformat PDF</t><br><br>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kategori.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nomor Surat<span class="text-danger">*</span></label>
                            <input type="text" id="no_surat" name="no_surat"
                                class="form-control @error('no_surat') is-invalid @enderror"
                                placeholder="Masukan no_surat" autocomplete="off">
                            @error('no_surat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control select2 @error('id_kategori') is-invalid @enderror" name="id_kategori"
                                data-id="select-kategori" id="id_kategori">
                                <option value="">Piih Kategori</option>
                                @foreach ($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">
                                        {{ $kategori->kategori }}</option>
                                @endforeach
                            </select>
                            @error('id_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                        <div class="form-group">
                            <label>Judul<span class="text-danger">*</span></label>
                            <input type="text" id="judul" name="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                placeholder="Masukan judul" autocomplete="off">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>File Surat (PDF)<span class="text-danger">*</span></label>
                            <input class="form-control" type="file" id="formFile">
                          </div>
                    </form>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Simpan</button>
                    <a class="btn btn-secondary" href="{{ route('surat.index') }}">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
@endpush

@push('customStyle')
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
