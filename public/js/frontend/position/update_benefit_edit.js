let BenefitsPosition = {
    init: function () {
    let update = $('.footer').on('click', '#update-benefit', function () {
        var code = []
        var min = []
        var max = []
        var error_code = []
        var error_name = []
        let position_uuid = $('input[name="position_uuid"]').val()

        i = 0
        $("input[name='check']:checked").each(function(){
            code.push(this.value);

            if($('#'+this.id+'_min').val() == ''){
                min.push(0)
            }else{
                min.push(($('#'+this.id+'_min').val()))
            }
            
            if($('#'+this.id+'_max').val() == ''){
                max.push(0)
            }else{
                max.push(($('#'+this.id+'_max').val()))
            }

            $('#'+this.id+'_min-error').attr('id','position_min'+i+'-error')
            $('#'+this.id+'_max-error').attr('id','position_max'+i+'-error')
            error_code.push(i)
            error_name.push(this.id)
            i++
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'put',
            url: '/position/update-benefits/'+position_uuid,
            data: {
                _token: $('input[name=_token]').val(),
                code: code,
                position_min: min,
                position_max: max,
            },
            success: function (data) {
                if (data.errors) {
                    $.each(data.errors, function (key, value) {
                        var error = $('#'+key+'-error');
                        if(key.indexOf(".") != -1){
                          var arr = key.split(".");
                          error = $('#'+arr[0]+arr[1]+'-error');
                        }

                        error.html(value[0])
                        
                        $.each(error_code, function (index, value) {
                            $('#position_min'+index+'-error').attr('id',error_name[index]+'_min-error')
                            $('#position_max'+index+'-error').attr('id',error_name[index]+'_max-error')
                        });
                      }); 
                } else {
                    toastr.success('Data has been saved.', 'Succes', {
                        timeOut: 5000
                    });

                    $.each(error_code, function (index, value) {
                        $('#position_min'+index+'-error').attr('id',error_name[index]+'_min-error')
                        $('#position_max'+index+'-error').attr('id',error_name[index]+'_max-error')
                    });
                }
            }
        });
    });

    }      
};

function checkboxFunction(id){
    if ($('#'+id).is(':checked')) {
        $('#'+id).attr('checked', true);
    }else{
        $('#'+id).attr('checked', false);
    }
}
jQuery(document).ready(function () {
    BenefitsPosition.init();
});
