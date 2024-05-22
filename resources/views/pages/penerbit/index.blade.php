@extends('layout.main')

@section('konten')
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $judul }}</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>

            <div class="mb-2">
                <a href="{{ url('/penerbit/create') }}" class="btn btn-primary">Tambah Data</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama Penerbit</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Tanggal Berdiri</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($penerbit as $p)
                            <tr>
                                <td>{{ $p->nama_penerbit }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_telepon }}</td>
                                <td>{{ $p->tanggal_berdiri }}</td>
                                <td>
                                    <a href="{{ url('/penerbit/edit/' . $p->id) }}" class="btn btn-info btn-sm">Ubah</a>
                                    <form action="{{ url('penerbit') }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center">data tidak ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



        </div>
    </section>
@endsection
