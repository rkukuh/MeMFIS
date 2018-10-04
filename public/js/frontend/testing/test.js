$(document).ready(function () {
$('.card-body').on('click', '.add', function () {
    // alert('klik');
    // var status = $('input[name="question1"]:checked').val();
    // alert(status);
    var uploadFile = document.getElementById("largeImage");
    if( ""==uploadFile.value){


    }
    else{
        var fd = new FormData();

        fd.append( "fileInput", $("#largeImage")[0].files[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            url: '/_test/testing',
            data: fd,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data){
                if(data.uploaded==true){
                    $('input[type=file]').val("") ;
                    document.getElementById('largeImage-label').innerHTML = '';
                    alert(data.url);

                }
            },
            error: function(err){
                alert(err);
            }
        });

    }
});
});