@extends('v_layouts.app')
@section('content')
 <style>
  .no-spinner::-webkit-inner-spin-button,
  .no-spinner::-webkit-outer-spin-button {
   -webkit-appearance: none;
   margin: 0;
  }

  .no-spinner {
   -moz-appearance: textfield;
  }
 </style>
 <div class="col-md-12">
  <div class="order-summary clearfix">
   <div class="section-title">
    <h3 class="title">PILIH PENGIRIMAN</h3>
   </div>{{-- PROVINSI --}} <div class="form-group"><label>Provinsi</label><select name="province_id" id="province"
     class="form-control">
     <option value="">-- Pilih Provinsi --</option>
     @foreach ($provinces as $province)
      <option value="{{ $province['id'] }}">{{ $province['name'] }}</option>
     @endforeach
    </select></div>{{-- KOTA --}} <div class="form-group"><label>Kota</label><select name="city_id" id="city"
     class="form-control">
     <option value="">-- Pilih Kota --</option>
    </select></div>{{-- KECAMATAN --}} <div class="form-group"><label>Kecamatan</label><select name="district_id"
     id="district" class="form-control">
     <option value="">-- Pilih Kecamatan --</option>
    </select></div>{{-- ALAMAT --}} <div class="form-group"><label>Alamat Lengkap</label>
    <textarea name="alamat" id="alamat" class="form-control" rows="4"
     placeholder="Masukkan alamat lengkap, ciri rumah">{{ old('alamat', $order->alamat ?? '') }}</textarea>
   </div>
   <div class="form-group"><label>Kode Pos</label><input name="pos" type="number" id="pos"
     class="form-control no-spinner" min="1" max="99999"
     oninput="if(parseInt(this.value) > 99999) this.value = 99999;"
     placeholder="Masukkan kode pos " />{{ old('pos', $order->pos ?? '') }} </div>{{-- KURIR --}} <div
    class="form-group"><label>Kurir</label><select id="courier" class="form-control" name="kurir">
     <option value="jne">JNE</option>
     <option value="tiki">TIKI</option>
     <option value="pos">POS</option>
    </select></div><button class="btn btn-primary btn-check">CEK ONGKIR</button><br><br>{{-- RESULT --}} <table
    class="table">
    <thead>
     <tr>
      <th>Layanan</th>
      <th>Biaya</th>
      <th>Estimasi</th>
      <th>Total Berat</th>
      <th></th>
     </tr>
    </thead>
    <tbody id="resultOngkir"></tbody>
   </table>
  </div>
 </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
 <script>
  $('#district').on('change', function() {
   console.log('District ID:', $(this).val());
  });

  $(document).ready(function() {

   // 🔹 CITY
   $('#province').on('change', function() {
    let provinceId = $(this).val();

    if (provinceId) {
     $.get(`/cities/${provinceId}`, function(response) {
      $('#city').html('<option value="">-- Pilih Kota --</option>');

      $.each(response, function(i, val) {
       $('#city').append(`<option value="${val.id}">${val.name}</option>`);
      });
     });
    }
   });

   // 🔹 DISTRICT
   $('#city').on('change', function() {
    let cityId = $(this).val();

    if (cityId) {
     $.get(`/districts/${cityId}`, function(response) {
      $('#district').html('<option value="">-- Pilih Kecamatan --</option>');

      $.each(response, function(i, val) {
       $('#district').append(`<option value="${val.id}">${val.name}</option>`);
      });
     });
    }
   });

   // 🔹 CEK ONGKIR

   $('.btn-check').click(function(e) {
    e.preventDefault();

    let token = "{{ csrf_token() }}";
    let district_id = $('#district').val();
    let courier = $('#courier').val();
    let weight = {{ $totalWeight }};

    let alamat = $('#alamat').val().trim();
    let pos = $('#pos').val().trim();

    if (!district_id || !courier || !alamat || !pos) {
     showAlert('Lengkapi data terlebih dahulu');
     return;
    }

    $.ajax({
     url: "/cost",
     type: "POST",
     dataType: "JSON",
     data: {
      _token: token,
      district_id: district_id,
      courier: courier,
      weight: weight
     },
     success: function(response) {

      let html = '';

      $.each(response, function(i, val) {

       // FILTER cuma service tertentu
       if (val.service === 'REG' || val.service === 'OKE' || val.service === 'YES') {

        html += `
<tr>
    <td>${val.service}</td>
    <td>Rp ${val.cost}</td>
    <td>${val.etd}</td>
    <td>{{ $totalWeight }} gram</td>
    <td>
        <form method="POST" action="{{ route('order.chooseShipping') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="kurir" value="${$('#courier').val()}">
            <input type="hidden" name="service" value="${val.service}">
            <input type="hidden" name="cost" value="${val.cost}">
            <input type="hidden" name="etd" value="${val.etd}">
            <input type="hidden" name="weight" value="{{ $totalWeight }}">
            <input type="hidden" name="alamat" value="${$('#alamat').val().replace(/"/g, '&quot;')}">
            <input type="hidden" name="pos" value="${$('#pos').val().replace(/"/g, '&quot;')}">
            <input type="hidden" name="province_name" value="${$('#province option:selected').text()}">
            <input type="hidden" name="city_name" value="${$('#city option:selected').text()}">
            <input type="hidden" name="district_name" value="${$('#district option:selected').text()}">

            <button class="btn btn-danger">PILIH</button>
        </form>
    </td>
</tr>
`;
       }

      });

      $('#resultOngkir').html(html);
     }
    });
   });

  });
 </script>
 <div id="customAlert" class="custom-alert">
  <div class="custom-alert-content">
   <h4>Oops !</h4>
   <p id="alertMessage"></p><button onclick="closeAlert()" class="btn btn-danger">OK </button>
  </div>
 </div>
 <style>
  .custom-alert {
   display: none;
   position: fixed;
   z-index: 99999;
   left: 0;
   top: 0;
   width: 100%;
   height: 100%;

   background: rgba(0, 0, 0, 0.5);

   justify-content: center;
   align-items: center;
  }

  .custom-alert-content {
   background: #fff;
   width: 90%;
   max-width: 350px;

   padding: 25px;
   border-radius: 15px;

   text-align: center;

   animation: popup .3s ease;
  }

  .custom-alert-content h4 {
   margin-bottom: 10px;
   color: #dc3545;
  }

  .custom-alert-content p {
   margin-bottom: 20px;
  }

  @keyframes popup {
   from {
    transform: scale(0.8);
    opacity: 0;
   }

   to {
    transform: scale(1);
    opacity: 1;
   }
  }
 </style>

 <script>
  function showAlert(message) {
   document.getElementById('alertMessage').innerText = message;
   document.getElementById('customAlert').style.display = 'flex';
  }

  function closeAlert() {
   document.getElementById('customAlert').style.display = 'none';
  }
 </script>
@endsection
