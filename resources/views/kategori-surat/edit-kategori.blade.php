@extends('layouts.template')

@section('content')
    <div class="content">
        <section class="section">
            <div class="section-body">
                <h2 class="section-title">Kategori Surat</h2>
                <t>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</t>
                <br><br>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nomor (Auto Increment)</label>
                                <input type="text" id="kategori" name="kategori"
                                    class="form-control
                                @error('kategori') is-invalid @enderror"
                                    placeholder="Masukan Ktegori" value="{{ old('kategori', $kategori->id_kategori) }}"
                                    data-id="input_kategori" autocomplete="off" disabled readonly>
                                @error('kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori"
                                    class="form-control
                                @error('nama_kategori') is-invalid @enderror"
                                    placeholder="Masukan nama_kategori"
                                    value="{{ old('kategori', $kategori->nama_kategori) }}" data-id="input_nama_kategori"
                                    autocomplete="off">
                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="textarea" id="keterangan" name="keterangan"
                                    class="form-control
                                @error('keterangan') is-invalid @enderror"
                                    placeholder="Masukan keterangan" value="{{ old('kategori', $kategori->keterangan) }}"
                                    data-id="input_keterangan" autocomplete="off">
                                @error('keterangan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Simpan</button>
                        <a class="btn btn-secondary" href="{{ route('kategori.index') }}">Cancel</a>
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
