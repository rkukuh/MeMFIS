let Workshift = {
    init: function () {

        $("input[name='days']").each(function(){
            if($('#'+this.id+'').not(':checked')){
                $('#'+this.id+'_in').attr('disabled', true)
                $('#'+this.id+'_out').attr('disabled', true)
                $('#'+this.id+'_break_in').attr('disabled', true)
                $('#'+this.id+'_break_out').attr('disabled', true)
            }
        });
    
    let create = $('.footer').on('click', '.add-workshift-schedule', function () {
        var code = $('input[name="code"]').val()
        var name = $('input[name="name"]').val()
        var description = $('#description').val()

        var days = []
        var days_in = []
        var break_in = []
        var break_out = []
        var days_out = []

        $("input[name='days']:checked").each(function(){
            days.push(this.value);
 
            if($('#'+this.id+'_in').val() == ''){
                days_in.push(0)
            }else{
                days_in.push(moment($('#'+this.id+'_in').val()  , 'h:mm A').format('HH:mm:ss'))
            }
            
            if($('#'+this.id+'_break_in').val() == ''){
                break_in.push(0)
            }else{
                break_in.push(moment($('#'+this.id+'_break_in').val()  , 'h:mm A').format('HH:mm:ss'))
            }

            if($('#'+this.id+'_break_out').val() == ''){
                break_out.push(0)
            }else{
                break_out.push(moment($('#'+this.id+'_break_out').val()  , 'h:mm A').format('HH:mm:ss'))
            }

            if($('#'+this.id+'_out').val() == ''){
                days_out.push(0)
            }else{
                days_out.push(moment($('#'+this.id+'_out').val()  , 'h:mm A').format('HH:mm:ss'))
            }
        });

        console.log(days_in)
        console.log(break_in)
        console.log(break_out)
        console.log(days_out)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/workshift/',
            data: {
                _token: $('input[name=_token]').val(),
                code: code,
                name: name,
                description: description,
                days: days,
                in: days_in,
                break_in: break_in,
                break_out: break_out,
                out: days_out
            },
            success: function (data) {
                if (data.errors) {
                    if (data.errors.code) {
                        $('#code-error').html(data.errors.code[0]);
                    }else{
                        $('#code-error').html('');
                    }
                    if (data.errors.name) {
                        $('#name-error').html(data.errors.name[0]);
                    }else{
                        $('#name-error').html('');
                    }
                    if (data.errors.description) {
                        $('#description-error').html(data.errors.description[0]);
                    }else{
                        $('#description-error').html('')
                    }
                } else {
                    toastr.success('Data has been saved.', 'Succes', {
                        timeOut: 5000
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
        $('#'+id+'_in').attr('disabled', false)
        $('#'+id+'_out').attr('disabled', false)
        $('#'+id+'_break_in').attr('disabled', false)
        $('#'+id+'_break_out').attr('disabled', false)
    }else{
        $('#'+id).attr('checked', false);
        $('#'+id+'_in').attr('disabled', true)
        $('#'+id+'_out').attr('disabled', true)
        $('#'+id+'_break_in').attr('disabled', true)
        $('#'+id+'_break_out').attr('disabled', true)
    }
}

jQuery(document).ready(function () {
    Workshift.init();
});