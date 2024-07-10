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
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
                    <th class="text-right">Aksi</th>
                </tr>
                @foreach ($surat as $key => $listSurat)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $listSurat->no_surat }}</td>
                    <td>{{ $listSurat->kategori->nama_kategori }}</td>
                    <td>{{ $listSurat->judul }}</td>
                    <td>{{ $listSurat->waktu }}</td>
                    <td class="text-right">
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('surat.destroy', $listSurat->id) }}"method="POST" class="ml-2">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token"
                                    value="{{ csrf_token() }}">
                                <button type="button" class="btn btn-danger"> Delete </button>
                                <a href="{{ route('surat.edit', $listSurat->id) }}"
                                    type="button" class="btn btn-success">Unduh</a>
                                <a href="{{ route('surat.edit', $listSurat->id) }}"
                                    type="button" class="btn btn-info">Lihat >></a>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><br>
        <div>
            <a href="{{ route('surat.create', $listSurat->id) }}"type="button" class="btn btn-outline-dark" >+ Tambah Kategori Baru</a>
        </div>
        {{-- <div class="d-flex justify-content-center">
        {{ $kecamatans->withQueryString()->links() }}
        </div> --}}
    </div>
</div>
</section>

@endsection
