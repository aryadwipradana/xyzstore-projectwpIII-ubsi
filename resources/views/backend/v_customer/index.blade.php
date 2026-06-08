@extends('backend.v_layouts.app')
@section('content')
 <!-- contentAwal -->
 <div class="row">
  <div class="col-12">
   <div class="card">
    <div class="card-body">
     <h5 class="card-title">{{ $judul }} <br><br>
     </h5>
     <div class="table-responsive">
      <table id="zero_config" class="table-striped table-bordered table">
       <thead>
        <tr>
         <th>No</th>
         <th>Nama</th>
         <th>Email</th>
        </tr>
       </thead>
       <tbody>
        @foreach ($index as $row)
         <tr>
          <td> {{ $loop->iteration }} </td>
          <td> {{ $row->user->nama }} </td>
          <td> {{ $row->user->email }} </td>
         </tr>
        @endforeach
       </tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
 <!-- contentAkhir -->
@endsection
