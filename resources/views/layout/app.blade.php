<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <title>Hello, world!</title>
  </head>
  <body>
    @include('component.pesan')
    @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#totalBonus, #percentage,#percentage2,#percentage3').on('input', function() {
        var totalBonus = $('#totalBonus').val();
        var percentage = $('#percentage').val();
        var percentage2 = $('#percentage2').val();
        var percentage3 = $('#percentage3').val();
        var payment = totalBonus * percentage / 100;
        var payment2 = totalBonus * percentage2 / 100;
        var payment3 = totalBonus * percentage3 / 100;
        $('#payment').val(payment);
        $('#payment2').val(payment2);
        $('#payment3').val(payment3);
        $('#percentage').val(percentage);
        $('#percentage2').val(percentage2);
        $('#percentage3').val(percentage3);
        
      });
    });
    
function convert_rupiah(angka, prefix = "Rp. ") { //format rupiah currency
    var number_string = angka.toString().replace(/[^,\d]/g, ''),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return !prefix ? rupiah : prefix + ' ' + rupiah;
}



</script>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>