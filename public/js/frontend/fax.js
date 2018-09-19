var simpan = $("#add").click(function() {
    var namearray = [];
    $('#name ').each(function(i) {
      namearray[i]=document.getElementsByName('['+i+'][name]')[0].value;
    });

    var registerForm = $("#AjaxTest");
    var formData = registerForm.serialize();
    $( '#ajax-error' ).html( "" );
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        url: '/fax',
        data: {
            '_token': $('input[name=_token]').val(),
            'name': namearray,
        },
        success: function(data){
            console.log(data);
            if(data.errors) {
                if(data.errors.name){
                    $( '#ajax-error' ).html(data.errors.name[0]);
                }
            }
            else{
              $("#modal_fax").modal("hide");
              toastr.success('Berhasil Disimpan.', 'Sukses!!', {timeOut: 5000});
              var table = $('.m_datatable').mDatatable();
              $('#simpan').text('Simpan');
              $('#clean').text('Bersihkan');
            }

        },
    });
});