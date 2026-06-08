@extends('backend.v_layouts.app')
@section('content')
 <!-- contentAwal -->
 <link href="{{ asset('backend/libs/flot/css/float-chart.css') }}" rel="stylesheet">

 <div class="row">
  <div class="col-12">
   <div class="card">
    <div class="card-body border-top">
     <h5 class="card-title"> {{ $judul }}</h5>
     <div class="alert alert-success" role="alert">
      <h4 class="alert-heading"> Selamat Datang, {{ Auth::user()->nama }}</h4>
      Aplikasi Toko Online dengan hak akses yang anda miliki sebagai
      <b>
       @if (Auth::user()->role == 1)
        Super Admin
       @elseif(Auth::user()->role == 0)
        Admin
       @endif
      </b>
      ini adalah halaman utama dari aplikasi Web Programming. Studi Kasus
      Toko Online.
      <hr>
      <p class="mb-0">Kuliah..? BSI Aja !!!</p>
     </div>
    </div>
   </div>
  </div>
 </div>

 <div class="row">
  <div class="col-md-12">
   <div class="card p-2">
    <div class="row">
     <!-- column -->
     <div class="col-lg-12 ">
      <div class="row">
       <div class="col-6 m-t-15">
        <div class="bg-warning p-10 text-center text-white">
         <i class="fa fa-user m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">{{ $totalcustomer }}</h5>
         <small class="font-light">Total User Pelanggan</small>
        </div>
       </div>

       <div class="col-6 m-t-15">
        <div class="bg-info p-10 text-center text-white">
         <i class="fa fa-plus m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">{{$totalproses}}</h5>
         <small class="font-light">Total Order Proses</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-success p-10 text-center text-white">
         <i class="fa fa-credit-card m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5"> Rp {{ number_format($totalomset, 0, ',', '.') }}</h5>
         <small class="font-light">Total Omset</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-dark p-10 text-center text-white">
         <i class="fa fa-tag m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">{{ $totalproduk }}</h5>
         <small class="font-light">Total Produk</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-danger p-10 text-center text-white">
         <i class="fa fa-cart-plus m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">{{ $totalorder }}</h5>
         <small class="font-light">Total Order</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-primary p-10 text-center text-white">
         <i class="fa fa-table m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">{{ $totalpending }}</h5>
         <small class="font-light">Pending Order</small>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>

   <div class="row">
    <div class="col-12">
     <div class="card">
      <div class="card-body">
       <h5 class="card-title">Line Chart Order</h5>
       <div id="bar-chart" class="bars"></div>
      </div>
     </div>
    </div>
   </div>
   <style>
    .bars {
     width: 100% !important;
     height: 400px;
    }

    @media (max-width: 768px) {
     .bars {
      width: 100% !important;

      height: 250px;
     }
    }

    @media (max-width: 576px) {
     .bars {
      width: 100% !important;
      height: 200px;
     }
    }
   </style>
   <div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Produk yang di upload terakhir</h4>
            </div>

            <div class="comment-widgets scrollable">

                @foreach ($latestpost as $item)
                    <div class="d-flex comment-row m-t-0 flex-row">

                        <div class="p-2">
                            <img src="{{ asset('storage/img-produk/thumb_sm_' . $item->foto) }}"
                                alt="{{ $item->nama_produk }}"
                                width="70"
                                class="rounded">
                        </div>

                        <div class="comment-text w-100">

                            <h6 class="font-medium">
                                {{ $item->nama_produk }}
                            </h6>

                            <span class="m-b-15 d-block">
                                {{ $item->deskripsi }}
                            </span>

                            <div class="comment-footer">

                                <span class="text-muted float-right">
                                    {{ $item->created_at->format('d M Y') }}
                                </span>

                                <a href="{{ route('backend.produk.edit', $item->id) }}"
                                    class="btn btn-cyan btn-sm">
                                    Edit
                                </a>

                                @if ($item->status == 1)
                                    <span class="btn btn-success btn-sm disabled">
                                        Publish
                                    </span>
                                @else
                                    <span class="btn btn-danger btn-sm">
                                        Draft
                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
</div>
    </div>

    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/libs/chart/matrix.interface.js') }}"></script>
    <script src="{{ asset('backend/libs/chart/excanvas.min.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('backend/libs/chart/matrix.charts.js') }}"></script>
    <script src="{{ asset('backend/libs/chart/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('backend/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('backend/libs/chart/turning-series.js') }}"></script>
    <script>
     $(window).resize(function() {
      location.reload();
     });
    </script>

    <script>
     $(function() {

      var data = [{
       label: "Total Order",
       data: [
        @foreach ($tanggal as $key => $tgl)
         [{{ $key }}, {{ $totalOrder[$key] }}],
        @endforeach
       ],
       bars: {
        show: true,
        barWidth: 0.5,
        align: "center"
       }
      }];

      $.plot("#bar-chart", data, {

       grid: {
        borderWidth: 1,
        hoverable: true,
        clickable: true
       },

       xaxis: {
        ticks: [
         @foreach ($tanggal as $key => $tgl)
          [{{ $key }}, "{{ \Carbon\Carbon::parse($tgl)->format('d M') }}"],
         @endforeach
        ]
       },

       yaxis: {
        min: 0
       }
      });

     });
    </script>

    <!-- contentAkhir -->
   @endsection
