let Item = {
    init: function () {
        $(document).ready(function () {
            $('.btn-success').removeClass('add');
            document.getElementById('isppn').onchange = function () {
                document.getElementById('ppn').disabled = !this.checked;
            };
        });

        $('.footer').on('click', '.reset', function () {
            item_reset();
        });


        $('.footer').on('click', '.add-item', function () {

            if ($('#tag :selected').length > 0) {
                var selectedtags = [];
                $('#tag :selected').each(function (i, selected) {
                    selectedtags[i] = $(selected).val();
                });
            }


            if (document.getElementById("isstock").checked) {
                isstock = 1;
            } else {
                isstock = 0;
            }

            if (document.getElementById("isppn").checked) {
                isppn = 1;
            } else {
                isppn = 0;
            }
            let accountcode2 = $('#accountcode2').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let quantity = $('input[name=quantity]').val();

            let description = $('#description').val();
            let category = $('#category').val();
            let unit = $('#unit').val();
            let barcode = $('input[name=barcode]').val();
            let ppn = $('input[name=ppn]').val();



            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    barcode: barcode,
                    quantity: quantity,
                    unit: unit,
                    isstock: isstock,
                    isppn: isppn,
                    ppn: ppn,
                    description: description,
                    accountcode: accountcode2,
                    selectedtags: selectedtags,
                    category: category

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }

                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);

                        }

                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);

                        }

                        if(unit == "Select a Unit"){
                            $('#unit-error').html("The Unit field is required.");

                        }

                        if(category == "Select a Category"){
                            $('#category-error').html("The Category field is required.");

                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);

                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('barcode').value = barcode;
                        document.getElementById('accountcode2').value = accountcode2;

                    } else {
                        $('input[type=file]').val("");
                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#description-error').html('');
                        $('#barcode-error').html('');
                        document.getElementById('item-uom').removeAttribute('disabled');
                        document.getElementById('item-minmaxstock').removeAttribute('disabled');
                        $('#item-storage').html(code);
                        $('#item-unit').html(code);
                        // item_reset();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        update_item_button();
                        // window.location.href = '/item/'+data.uuid+'/edit';
                    }
                }
            });
        });

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
            $('.footer').on('click', '.add-item', function () {
                let formData = new FormData();
                let code = $('input[name=code]').val();
                formData.append('code', code);

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

                    url: '/post-photos',
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


        let simpan = $('.modal-footer').on('click', '.add-journal', function () {
            $('#simpan').text('Simpan');

            let type = $('#type').val();
            let level = $('#level').val();
            let registerForm = $('#CustomerForm');
            let code = $('input[name=code-journal]').val();
            let name = $('input[name=name-journal]').val();
            let formData = registerForm.serialize();
            let description = $('#description-journal').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/journal',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    type: type,
                    level: level,
                    description: description
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);


                            document.getElementById('code-journal').value = code;
                            document.getElementById('name-journal').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;

                            document.getElementById('description-journal').value = description;
                        }


                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('code-journal').value = code;
                            document.getElementById('name-journal').value = name;

                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description-journal').value = description;

                        }

                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                            document.getElementById('code-journal').value = code;
                            document.getElementById('name-journal').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description-journal').value = description;
                        }

                        if (data.errors.level) {
                            $('#level-error').html(data.errors.level[0]);

                            document.getElementById('code-journal').value = code;
                            document.getElementById('name-journal').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description-journal').value = description;
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);

                            document.getElementById('code-journal').value = code;
                            document.getElementById('name-journal').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description-journal').value = description;
                        }
                    } else {
                        accountcode();
                        $('#modal_journal').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#type-error').html('');
                        $('#level-error').html('');
                        $('#description-error').html('');

                        let table = $('.m_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    Item.init();
});
