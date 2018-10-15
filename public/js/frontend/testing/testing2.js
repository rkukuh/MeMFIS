$(function () {

    // klik();
    let inputFile = $('#myInput');
    let button = $('#myButton');
    let buttonSubmit = $('#add-item');
    let filesContainer = $('#myFiles');
    let files = [];

    inputFile.change(function () {
        let newFiles = [];
        for (let index = 0; index < inputFile[0].files.length; index++) {
            let file = inputFile[0].files[index];
            newFiles.push(file);
            files.push(file);
        }

        newFiles.forEach(file => {
            let fileElement = $(`<p>${file.name}</p>`);
            fileElement.data('fileData', file);
            filesContainer.append(fileElement);

            fileElement.click(function (event) {
                let fileElement = $(event.target);
                let indexToRemove = files.indexOf(fileElement.data('fileData'));
                fileElement.remove();
                files.splice(indexToRemove, 1);
            });
        });
    });

    button.click(function () {
        inputFile.click();
    });
    $('.m-portlet__foot').on('click', '.add', function () {
        let formData = new FormData();
        let name = $('input[name=name]').val();
        formData.append('name', name);

        let z = 0;
        files.forEach(file => {
            formData.append('file' + z, file);
            z++;
        });

        // console.log('Sending...');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                url: '/_test/photo',
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if (data.uploaded == true) {
                        // alert('sukses');
                    }
                },
                error: function (err) {
                    alert(err);
                }
            });
    });
});

$('.m-portlet__foot').on('click', '.add', function () {
    // alert('tess');
    let name = $('input[name=name]').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/_test/text',
        data: {
            _token: $('input[name=_token]').val(),
            name: name,

        },
        success: function (data) {
            if (data.errors) {
                // if (data.errors.code) {
                //     $('#code-error').html(data.errors.code[0]);

                // }

                // if (data.errors.name) {
                //     $('#name-error').html(data.errors.name[0]);

                // }

                // document.getElementById('code').value = code;
                // document.getElementById('name').value = name;
                // document.getElementById('description').value = description;
                // document.getElementById('barcode').value = barcode;
                // document.getElementById('accountcode2').value = accountcode2;

            } else {

                // $('input[type=file]').val("");
                // $('#code-error').html('');
                // $('#name-error').html('');
                // $('#description-error').html('');
                // $('#barcode-error').html('');
                // document.getElementById('item-uom').removeAttribute('disabled');
                // document.getElementById('item-minmaxstock').removeAttribute('disabled');
                // $('#item-storage').html(code);
                // $('#item-unit').html();
                // item_reset();
                toastr.success('Data berhasil disimpan.', 'Sukses', {
                    timeOut: 5000
                });
                // update_item_button();
                // photo();
            }
        }
    });
});