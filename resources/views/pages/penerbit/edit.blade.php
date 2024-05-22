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

            <form action="{{ url('/penerbit') }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $penerbit->id }}">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penerbit</label>
                    <input type="text" name="nama_penerbit" class="form-control" value="{{ $penerbit->nama_penerbit }}"
                        placeholder="Nama Penerbit">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $penerbit->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" name="no_telepon" class="form-control" value="{{ $penerbit->no_telepon }}"
                        placeholder="Nomor Telepon">
                </div>
                {{-- <div class="mb-3">
                    <label for="no_telepon" class="form-label">Tanggal Berdiri</label>
                    <input type="date" name="tanggal_berdiri" value="{{ $penerbit->tanggal_berdiri }}"
                        class="form-control">
                </div> --}}
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
            </form>
        </div>
    </section>
@endsection
