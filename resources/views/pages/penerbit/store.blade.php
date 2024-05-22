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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/penerbit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penerbit</label>
                    <input type="text" name="nama_penerbit" class="form-control {{ $errors->has('nama_penerbit') ? 'is-invalid' : '' }}" placeholder="Nama Penerbit">
                    @if ($errors->has('nama_penerbit'))
                        <span class="text-danger">{{ $errors->first('nama_penerbit') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat" rows="3"></textarea>
                    @if ($errors->has('alamat'))
                        <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" name="no_telepon" class="form-control {{ $errors->has('no_telepon') ? 'is-invalid' : '' }}" placeholder="Nomor Telepon">
                    @if ($errors->has('no_telepon'))
                        <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Tanggal Berdiri</label>
                    <input type="date" name="tanggal_berdiri" class="form-control {{ $errors->has('tanggal_berdiri') ? 'is-invalid' : '' }}">
                    @if ($errors->has('tanggal_berdiri'))
                        <span class="text-danger">{{ $errors->first('tanggal_berdiri') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>

            </form>




        </div>
    </section>
@endsection
