<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">EDIT BONUS</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">

              <input type="hidden" id="post_id">              

              <div class="form-outline mb-4">
                <label class="form-label" for="totalBonus-edit">Pembayaran Bonus</label>
                <input type="number" id="totalBonus-edit"  class="form-control" placeholder="Masukkan Jumlah Pembayaran"/> 
                <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-totalBonus-edit"></div>
              </div>
              <div class="row">
                <div class="col">
                  <!-- Name input -->
                  <label for="basic-url" class="form-label">Buruh A</label>
                    <div class="input-group mb-3">
                      <input type="text" id="percentage-edit"  class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100"/>
                        <span class="input-group-text">%</span>
                      </div>
                      <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage-edit"></div>
                </div>
                <div class="col">
                    <!-- Name input -->
                    <label for="basic-url" class="form-label">Buruh B</label>
                      <div class="input-group mb-3">
                        <input type="text" id="percentage2-edit"  class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100"/>
                          <span class="input-group-text">%</span>
                        </div>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage2-edit"></div>
                  </div>
                  <div class="col">
                    <!-- Name input -->
                    <label for="basic-url" class="form-label">Buruh C</label>
                      <div class="input-group mb-3">
                        <input type="text" id="percentage3-edit" class="form-control" placeholder="Masukkan jumlah Presentase" maxlength="100" min="1" max="100"/>
                          <span class="input-group-text">%</span>
                        </div>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-percentage3-edit"></div>
                  </div>
              </div>
              <hr>
              <h1 class="mt-5 text-center">Upah Pembayaran Bonus</h1>
              <hr>
                <div class="row">
                  <div class="col-md-4 mb-4">
                      <label for="">Buruh A</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                          </div>
                        <input type="text" class="form-control" id="payment-edit" data-affixes-stay="true" data-prefix="Rp. " data-thousands="." data-decimal="," readonly>
                      </div>
                  </div>
                  <div class="col-md-4 mb-4">
                      <label for="">Buruh B</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                          </div>
                        <input type="text" class="form-control" id="payment2-edit" readonly>
                      </div>
                  </div>
                  <div class="col-md-4 mb-4">
                      <label for="">Buruh C</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                          </div>
                        <input type="text" class="form-control" id="payment3-edit" readonly>
                      </div>
                  </div>


          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
              <button type="button" class="btn btn-primary" id="update">UPDATE</button>
          </div>
      </div>
  </div>
</div>

<script>

$(document).ready(function() {
      $('#totalBonus-edit, #percentage-edit,#percentage2-edit,#percentage3-edit').on('input', function() {
        var totalBonus = $('#totalBonus-edit').val();
        var percentage = $('#percentage-edit').val();
        var percentage2 = $('#percentage2-edit').val();
        var percentage3 = $('#percentage3-edit').val();
        var payment = totalBonus * percentage / 100;
        var payment2 = totalBonus * percentage2 / 100;
        var payment3 = totalBonus * percentage3 / 100;
        $('#payment-edit').val(payment);
        $('#payment2-edit').val(payment2);
        $('#payment3-edit').val(payment3);
        $('#percentage-edit').val(percentage);
        $('#percentage2-edit').val(percentage2);
        $('#percentage3-edit').val(percentage3);
        
      });
    });

$('body').on('click', '#btn-edit', function () {

let post_id = $(this).data('id');

//fetch detail post with ajax
$.ajax({
    url: `/posts/${post_id}`,
    type: "GET",
    cache: false,
    success:function(response){

        //fill data to form
        $('#post_id').val(response.data.id);
        $('#totalBonus-edit').val(response.data.totalBonus);
        $('#percentage-edit').val(response.data.percentage);
        $('#percentage2-edit').val(response.data.percentage2);
        $('#percentage3-edit').val(response.data.percentage3);
        $('#payment-edit').val(response.data.payment);
        $('#payment2-edit').val(response.data.payment2);
        $('#payment3-edit').val(response.data.payment3);
        // $('#content-edit').val(response.data.content);

        //open modal
        $('#edit').modal('show');
    }
});
});

  // action update 
  $('#update').click(function(e) {
      e.preventDefault();

      //define variable
      let post_id = $('#post_id').val();
      let totalBonus   = $('#totalBonus-edit').val();
      let percentage = $('#percentage-edit').val();
      let percentage2 = $('#percentage2-edit').val();
      let percentage3 = $('#percentage3-edit').val();
      let payment = $('#payment-edit').val();
      let payment2 = $('#payment2-edit').val();
      let payment3 = $('#payment3-edit').val();
      let token   = $("meta[name='csrf-token']").attr("content");
      
      //ajax
      $.ajax({

          url: `/posts/${post_id}`,
          type: "PUT",
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
                  timer: 3000
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
              
              //append to post data
              $(`#index_${response.data.id}`).replaceWith(post);

              //close modal
              $('#edit').modal('hide');
              

          },
          error:function(error){
              
              if(error.responseJSON.totalBonus[0]) {

                  //show alert
                  $('#alert-totalBonus-edit').removeClass('d-none');
                  $('#alert-totalBonus-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-totalBonus-edit').html(error.responseJSON.totalBonus[0]);
              } 

              if(error.responseJSON.percentage[0]) {

                  //show alert
                  $('#alert-percentage-edit').removeClass('d-none');
                  $('#alert-percentage-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-percentage-edit').html(error.responseJSON.percentage[0]);
              } 
              if(error.responseJSON.percentage2[0]) {

                  //show alert
                  $('#alert-percentage2-edit').removeClass('d-none');
                  $('#alert-percentage2-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-percentage2-edit').html(error.responseJSON.percentage2[0]);
              } 
              if(error.responseJSON.percentage3[0]) {

                  //show alert
                  $('#alert-percentage3-edit').removeClass('d-none');
                  $('#alert-percentage3-edit').addClass('d-block');

                  //add message to alert
                  $('#alert-percentage3-edit').html(error.responseJSON.percentage3[0]);
              } 

          }

      });

  });

</script>