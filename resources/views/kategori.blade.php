@extends('template')
@section('content')

<div class="content">
    <div class="table-responsive">
        <table class="table table-bordered table-md">
            <div class="card-header">
                <h2 class="card-title"> KATEGORI SURAT</h2>
                <t>Berikut ini adalah kategori tang bisa digunakan untuk melabeli surat.</t><br>
                <t>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</t>
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
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th class="text-right">Aksi</th>
                </tr>
                @foreach ($kategori as $key => $listKategori)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $listKategori->nama_kategori }}</td>
                    <td>{{ $listKategori->keterangan }}</td>
                    <td class="text-right">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('kategori.edit', $listKategori->id) }}"
                                type="button" class="btn btn-warning" >Edit</a>
                            <form action="{{ route('kategori.destroy', $listKategori->id) }}"method="POST" class="ml-2">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token"
                                    value="{{ csrf_token() }}">
                                <button type="button" class="btn btn-danger"> Delete </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div><br>
            <a href="{{ route('kategori.create', $listKategori->id) }}"type="button" class="btn btn-outline-dark" >+ Tambah Kategori Baru</a>
        </div>
        {{-- <div class="d-flex justify-content-center">
        {{ $kecamatans->withQueryString()->links() }}
        </div> --}}
    </div>
</div>
</section>

@endsection
