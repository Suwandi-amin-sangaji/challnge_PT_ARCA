@extends('layout.app')

@section('content')
<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 200px;
          "></div>
    <!-- Background image -->
  
    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">
  
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <h2 class="fw-bold mb-5">Nilai Rata-rata Penghasilan</h2>
            <form method="POST">
              <div class="form-outline mb-4">
                <label class="form-label" for="totalBonus">Pembayaran Bonus</label>
                <input type="text" id="totalBonus" name="totalBonus" class="form-control" placeholder="Masukkan Jumlah Pembayaran" data-affixes-stay="true" data-prefix="Rp. " data-thousands="." data-decimal=","  required/> 
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="percentage">Buruh A</label>
                <input type="number" id="percentage" name="percentage" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100" required/>
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage"></div>
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="percentage2">Buruh B</label>
                <input type="number" id="percentage2" name="percentage2" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100" required/>
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage"></div>
              </div>
              <div class="form-outline mb-4">
                <label class="form-label" for="percentage3">Buruh C</label>
                <input type="number" id="percentage3" name="percentage3" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100" required/>
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage"></div>
              </div>
               <!-- Submit button -->
               

              <h1 class="mb-3"> Hasil Perhitungan</h1>

              <div class="row">
                <div class="col-md-4 mb-4">
                    <label for="">Buruh A</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                      <input type="text" class="form-control" id="payment" name="payment" data-affixes-stay="true" data-prefix="Rp. " data-thousands="." data-decimal="," readonly>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Buruh B</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                      <input type="text" class="form-control" id="payment2" name="payment2" readonly>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="">Buruh C</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                          <div class="input-group-text">Rp.</div>
                        </div>
                      <input type="text" class="form-control" id="payment3" name="payment3" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-4" id="store">
                Simpan
              </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
  

@endsection

