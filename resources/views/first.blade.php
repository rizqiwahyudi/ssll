@extends('layouts.app2')

@section('title', '| Welcome')
@section('content')
<!-- Header -->
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-3">
    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</div>
<style>
    .c {
        filter: brightness(40%);
        border-radius: 15px;

    }
</style>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-mdb-ride="carousel" data-mdb-interval="true">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
					<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active" data-mdb-interval="2000">
						<img src="{{ asset('img/theme/1.jpg') }}" class="d-block w-100 c" alt="...">
						<div class="carousel-caption d-none d-md-block">
                            <a href="{{ route('survey.create') }}" class="btn btn-icon btn-primary mb-4" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                <span class="btn-inner--text">Lakukan Survey</span>
                            </a>
							<p>Sebagai negara hukum, segala prilaku pengendara diatur dalam aturan hukum yaitu dengan kewajiban mematuhi Undang-undang Nomor 22 Tahun 2009 tentang Lalu Lintas dan Angkutan Jalan.</p>
                        </div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('img/theme/2.jpg') }}" class="d-block w-100 c" alt="...">
						<div class="carousel-caption d-none d-md-block">
                            <a href="{{ route('survey.create') }}" class="btn btn-icon btn-primary mb-4" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                <span class="btn-inner--text">Lakukan Survey</span>
                            </a>
							<p>Dikeluarkannya Undang-undang Nomor 22 Tahun 2009 bertujuan untuk mewujudkan keamanan, keselamatan, ketertiban dan kelancaran lalu lintas (KAMSELTIBCAR LANTAS), terwujudnya etika berlalu lintas adalah citra budaya bangsa, terwujudnya penegakan dan kepastian hukum bagi masyarakat.</p>
						</div>
					</div>
					<div class="carousel-item">
						<img src="{{ asset('img/theme/3.jpg') }}" class="d-block w-100 c" alt="...">
						<div class="carousel-caption d-none d-md-block">
                            <a href="{{ route('survey.create') }}" class="btn btn-icon btn-primary mb-4" type="button">
                                <span class="btn-inner--icon"><i class="ni ni-book-bookmark"></i></span>
                                <span class="btn-inner--text">Lakukan Survey</span>
                            </a>
							<p>Sekolah bisa jadi memberikan andil untuk menjadi pelopor keselamatan atau bahkan kecelakaan dan kematian. Tidak sedikit sekarang kita bisa lihat begitu banyaknya pelajar dibawah umur dengan sengaja bahkan membawa motor atau mobil saat bersekolah, terlepas disimpan dilingkungan sekolah atau diluar sekolah.</p>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>

        </div>
    </div>
@endsection
