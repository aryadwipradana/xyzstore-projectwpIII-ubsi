@extends('v_layouts.app')

@section('content')
<style>
    .about-section {
        padding: 60px 0;
    }

    .about-card {
        background: #fff;
        padding: 35px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        margin-bottom: 30px;
    }

    .about-title {
        font-size: 32px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #2B2D42;
    }

    .about-text {
        font-size: 15px;
        line-height: 28px;
        color: #555;
    }

    .feature-box {
        text-align: center;
        padding: 30px 20px;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: .3s;
        margin-bottom: 25px;
    }

    .feature-box:hover {
        transform: translateY(-5px);
    }

    .feature-box i {
        font-size: 40px;
        color: #131313;
        margin-bottom: 15px;
    }

    .feature-box h4 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .team-card {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        margin-bottom: 25px;
    }

    .team-card img {
        width: 100%;
        height: 250px;
        object-fit: cover;
    }

    .team-body {
        padding: 20px;
    }

    .team-body h4 {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .team-body p {
        color: #777;
        margin: 0;
    }

    .about-banner {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 30px;
        object-fit: cover;
        max-height: 400px;
    }
</style>

<div class="about-section">

    {{-- BANNER --}}
    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f"
        class="about-banner"
        alt="About Us">

    {{-- ABOUT --}}
    <div class="about-card">
        <h2 class="about-title">Tentang Kami</h2>

        <p class="about-text">
            Selamat datang di <strong>Toko Online</strong>, platform belanja online yang menyediakan berbagai produk
            berkualitas dengan harga terbaik. Kami hadir untuk memberikan pengalaman berbelanja yang mudah,
            aman, dan nyaman bagi seluruh pelanggan di Indonesia.
        </p>

        <p class="about-text">
            Dengan sistem pemesanan yang cepat dan dukungan pengiriman ke berbagai daerah,
            kami berkomitmen memberikan pelayanan terbaik untuk setiap transaksi yang dilakukan pelanggan.
        </p>
    </div>

    {{-- VISI MISI --}}
    <div class="row">

        <div class="col-md-6">
            <div class="feature-box">
                <i class="fa fa-eye"></i>
                <h4>Visi</h4>
                <p>
                    Menjadi platform toko online terpercaya dan terbaik dalam memberikan pelayanan
                    serta produk berkualitas kepada pelanggan.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="feature-box">
                <i class="fa fa-bullseye"></i>
                <h4>Misi</h4>
                <p>
                    Memberikan kemudahan berbelanja online dengan sistem yang cepat,
                    aman, dan pelayanan pelanggan yang responsif.
                </p>
            </div>
        </div>

    </div>

    {{-- KEUNGGULAN --}}
    <div class="about-card">
        <h2 class="about-title text-center">Kenapa Memilih Kami?</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-shopping-cart"></i>
                    <h4>Produk Berkualitas</h4>
                    <p>
                        Produk pilihan dengan kualitas terbaik dan harga terjangkau.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-truck"></i>
                    <h4>Pengiriman Cepat</h4>
                    <p>
                        Dukungan pengiriman ke berbagai wilayah dengan layanan terpercaya.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fa fa-lock"></i>
                    <h4>Transaksi Aman</h4>
                    <p>
                        Sistem pembayaran dan pemesanan yang aman serta mudah digunakan.
                    </p>
                </div>
            </div>

        </div>
    </div>

    {{-- TEAM --}}
    {{-- <div class="about-card">
        <h2 class="about-title text-center">Tim Kami</h2>

        <div class="row">

            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://i.pravatar.cc/300?img=12" alt="">
                    <div class="team-body">
                        <h4>Arya</h4>
                        <p>Founder & Developer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://i.pravatar.cc/300?img=32" alt="">
                    <div class="team-body">
                        <h4>Michael</h4>
                        <p>UI/UX Designer</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="team-card">
                    <img src="https://i.pravatar.cc/300?img=15" alt="">
                    <div class="team-body">
                        <h4>Jonathan</h4>
                        <p>Marketing</p>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}

</div>
@endsection