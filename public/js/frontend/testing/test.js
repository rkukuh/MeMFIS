$(document).ready(function () {
$('.card-body').on('click', '.add', function () {


    // alert('klik');
    // var status = $('input[name="question1"]:checked').val();
    // alert(status);
    var uploadFile = document.getElementById("largeImage");
    // if( ""==uploadFile.value){


    // }
    // else{

        // fd.append( "fileInput", $("#largeImage")[0].files[0]);
        alert('namearray[i]');

        let namearray = [];

        $('#largeImage ').each(function (i) {
            // alert('2');
            // namearray[i] = document.getElementsByName('[' + i + '][name]')[0].value;
            var fd = new FormData();

        fd.append( "fileInput", document.getElementsByName('[' + i + '][name]')[0].files[0]);
            // alert(namearray[i]);
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
        });





    // }
});
});