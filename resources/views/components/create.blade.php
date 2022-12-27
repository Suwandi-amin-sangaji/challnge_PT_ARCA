<!-- Modal -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nilai Rata-Rata Bonus Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
              </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="totalBonus">Pembayaran Bonus</label>
                    <input type="number" id="totalBonus" name="totalBonus" class="form-control" placeholder="Masukkan Jumlah Pembayaran"/> 
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-totalBonus"></div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <!-- Name input -->
                      <label for="basic-url" class="form-label">Buruh A</label>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" id="percentage" name="percentage" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100">
                            <span class="input-group-text">%</span>
                          </div>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage"></div>
                    </div>
                    <div class="col">
                        <!-- Name input -->
                        <label for="basic-url" class="form-label">Buruh B</label>
                          <div class="input-group mb-3">
                              <input type="number" class="form-control" id="percentage2" name="percentage2" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100">
                              <span class="input-group-text">%</span>
                            </div>
                          <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage2"></div>
                      </div>
                      <div class="col">
                        <!-- Name input -->
                        <label for="basic-url" class="form-label">Buruh C</label>
                          <div class="input-group mb-3">
                              <input type="number" class="form-control" id="percentage3" name="percentage3" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100">
                              <span class="input-group-text">%</span>
                            </div>
                          <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage3"></div>
                      </div>
                  </div>

                  <hr>
                  <h1 class="mt-5 text-center">Hasil Perhitungan Bonus</h1>
                  <hr>

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

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

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

    // $('#totalBonus,#percentage,#percentage2,#percentage3').on('input', function() {
    //   var totalBonus = $('#totalBonus').val();
    //   var percentage = 100 / 3; // 3 orang
    //   var percentage2 = 100 / 3;
    //   var percentage3 = 100 / 3;
    //     $('#percentage').val(percentage);
    //     $('#percentage2').val(percentage2);
    //     $('#percentage3').val(percentage3);
    // });

    //button create post event
    $('body').on('click', '#btn-create', function () {

        //open modal
        $('#create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let totalBonus   = $('#totalBonus').val();
        let percentage = $('#percentage').val();
        let percentage2 = $('#percentage2').val();
        let percentage3 = $('#percentage3').val();
        let payment = $('#payment').val();
        let payment2 = $('#payment2').val();
        let payment3 = $('#payment3').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `/posts`,
            type: "POST",
            cache: false,
            data: {
                "totalBonus": totalBonus,
                "percentage": percentage,
                "percentage2": percentage2,
                "percentage3": percentage3,
                "payment": payment,
                "payment2": payment2,
                "payment3": payment3,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.totalBonus}</td>
                        <td>${response.data.percentage}</td>
                        <td>${response.data.percentage2}</td>
                        <td>${response.data.percentage3}</td>
                        <td>${response.data.payment}</td>
                        <td>${response.data.payment2}</td>
                        <td>${response.data.payment3}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit" data-id="${response.data.id}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:void(0)" id="btn-delete" data-id="${response.data.id}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-posts').prepend(post);
                
                //clear form
                $('#totalBonus').val('');
                $('#percentage').val('');
                $('#percentage2').val('');
                $('#percentage3').val('');
                $('#payment').val('');
                $('#payment2').val('');
                $('#payment3').val('');

                //close modal
                $('#create').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.totalBonus[0]) {

                    //show alert
                    $('#alert-totalBonus').removeClass('d-none');
                    $('#alert-totalBonus').addClass('d-block');

                    //add message to alert
                    $('#alert-totalBonus').html(error.responseJSON.totalBonus[0]);
                } 

                if(error.responseJSON.percentage[0]) {
                    //show alert
                    $('#alert-percentage').removeClass('d-none');
                    $('#alert-percentage').addClass('d-block');

                    //add message to alert
                    $('#alert-percentage').html(error.responseJSON.percentage[0]);
                } 
                if(error.responseJSON.percentage2[0]) {

                    //show alert
                    $('#alert-percentage2').removeClass('d-none');
                    $('#alert-percentage2').addClass('d-block');

                    //add message to alert
                    $('#alert-percentage2').html(error.responseJSON.percentage2[0]);
                } 
                if(error.responseJSON.percentage3[0]) {

                    //show alert
                    $('#alert-percentage3').removeClass('d-none');
                    $('#alert-percentage3').addClass('d-block');

                    //add message to alert
                    $('#alert-percentage3').html(error.responseJSON.percentage3[0]);
                } 

            }

        });

    });

</script>