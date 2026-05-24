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
        <div class="bg-success p-10 text-center text-white">
         <i class="fa fa-user m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">2540</h5>
         <small class="font-light">Total User Pelanggan</small>
        </div>
       </div>
       {{-- <div class="col-6">
         <div class="bg-dark p-10 text-center text-white">
          <i class="fa fa-plus m-b-5 font-16"></i>
          <h5 class="m-b-0 m-t-5">120</h5>
          <small class="font-light">New Users</small>
         </div>
        </div> --}}
       <div class="col-6 m-t-15">
        <div class="bg-dark p-10 text-center text-white">
         <i class="fa fa-cart-plus m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">656</h5>
         <small class="font-light">Total Produk</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-danger p-10 text-center text-white">
         <i class="fa fa-tag m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">9540</h5>
         <small class="font-light">Total Order</small>
        </div>
       </div>
       <div class="col-6 m-t-15">
        <div class="bg-primary p-10 text-center text-white">
         <i class="fa fa-table m-b-5 font-16"></i>
         <h5 class="m-b-0 m-t-5">100</h5>
         <small class="font-light">Pending Order</small>
        </div>
       </div>
       {{-- <div class="col-6 m-t-15">
         <div class="bg-dark p-10 text-center text-white">
          <i class="fa fa-globe m-b-5 font-16"></i>
          <h5 class="m-b-0 m-t-5">8540</h5>
          <small class="font-light">Online Orders</small>
         </div>
        </div> --}}
      </div>
     </div>
    </div>
   </div>
   
 <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Line Chart</h5>
                <div class="bars"></div>
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
  <!-- column -->
  <div class="col-lg-12">
   <div class="card">
    <div class="card-body">
     <h4 class="card-title">3 Produk yang di upload terakhir</h4>
    </div>
    <div class="comment-widgets scrollable">
     <!-- Comment Row -->
     <div class="d-flex comment-row m-t-0 flex-row">
      <div class="p-2"><img src="assets/images/users/1.jpg" alt="user" width="50" class="rounded-circle">
      </div>
      <div class="comment-text w-100">
       <h6 class="font-medium">James Anderson</h6>
       <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of
        the printing and type setting industry. </span>
       <div class="comment-footer">
        <span class="text-muted float-right">April 14, 2016</span>
        <button type="button" class="btn btn-cyan btn-sm">Edit</button>
        <button type="button" class="btn btn-success btnsm">Publish</button>
        <button type="button" class="btn btn-danger btnsm">Delete</button>
       </div>
      </div>
     </div>
     <!-- Comment Row -->
     <div class="d-flex comment-row flex-row">
      <div class="p-2"><img src=assets/images/users/4.jpg" alt="user" width="50" class="rounded-circle">
      </div>
      <div class="comment-text active w-100">
       <h6 class="font-medium">Michael Jorden</h6>
       <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of
        the printing and type setting industry. </span>
       <div class="comment-footer">
        <span class="text-muted float-right">May 10, 2016</span>
        <button type="button" class="btn btn-cyan btn-sm">Edit</button>
        <button type="button" class="btn btn-success btnsm">Publish</button>
        <button type="button" class="btn btn-danger btnsm">Delete</button>
       </div>
      </div>
     </div>
     <!-- Comment Row -->
     <div class="d-flex comment-row flex-row">
      <div class="p-2"><img src=assets/images/users/5.jpg" alt="user" width="50" class="rounded-circle">
      </div>
      <div class="comment-text w-100">
       <h6 class="font-medium">Johnathan Doeting</h6>
       <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of
        the printing and type setting industry. </span>
       <div class="comment-footer">
        <span class="text-muted float-right">August 1, 2016</span>
        <button type="button" class="btn btn-cyan btn-sm">Edit</button>
        <button type="button" class="btn btn-success btnsm">Publish</button>
        <button type="button" class="btn btn-danger btnsm">Delete</button>
       </div>
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
    $(window).resize(function () {
        location.reload();
    });
</script>

    <!-- contentAkhir -->
 @endsection
