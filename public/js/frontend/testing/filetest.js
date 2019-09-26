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

            if ($('#category :selected').length > 0) {
                var selectedcategories = [];
                $('#category :selected').each(function (i, selected) {
                    selectedcategories[i] = $(selected).val();
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
            let description = $('#description').val();
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
                    ppn: ppn,
                    description: description,
                    accountcode: accountcode2,
                    selectedcategories: selectedcategories

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

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
                        $('#item-unit').html();
                        // item_reset();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        // photo();
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
                                alert('sukses');
                            }
                        },
                        error: function (err) {
                            alert(err);
                        }
                    });
            });
        });

    }
};

jQuery(document).ready(function () {
    Item.init();
});

let Item = {
    init: function () {
        $('.m_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-items',

                        map: function (raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        }
                    }
                },
                pageSize: 10,
                serverPaging: !0,
                serverFiltering: !1,
                serverSorting: !0
            },
            layout: {
                theme: 'default',
                class: '',
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $('#generalSearch')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [{
                    field: 'code',
                    title: 'Part No.',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'name',
                    title: 'Item Name',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

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

            if ($('#category :selected').length > 0) {
                var selectedcategories = [];
                $('#category :selected').each(function (i, selected) {
                    selectedcategories[i] = $(selected).val();
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
            let description = $('#description').val();
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
                    ppn: ppn,
                    description: description,
                    accountcode: accountcode2,
                    selectedcategories: selectedcategories

                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

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
                        $('#item-unit').html();
                        item_reset();
                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        // photo();
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
                                alert('sukses');
                            }
                        },
                        error: function (err) {
                            alert(err);
                        }
                    });
            });
        });

        let edit = $('.m_datatable').on('click', '.edit', function () {
            $('#button').show();
            $('#simpan').text('Perbarui');

            let triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('id').value = data.id;
                    document.getElementById('name').value = data.name;

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            $('#button').show();
            $('#name-error').html('');
            $('#simpan').text('Perbarui');

            let name = $('input[name=name]').val();
            let triggerid = $('input[name=id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/item/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('name').value = name;
                        }
                    } else {
                        $('#modal_customer').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let show = $('.m_datatable').on('click', '.show', function () {
            $('#button').hide();
            $('#simpan').text('Perbarui');

            let triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/' + triggerid,
                success: function (data) {
                    document.getElementById('TitleModalCustomer').innerHTML = 'Detail Customer #ID-' + triggerid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('name').readOnly = true;
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        let remove = $('.m_datatable').on('click', '.delete', function () {
            let triggerid = $(this).data('id');

            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/item/' + triggerid + '',
                        success: function (data) {
                            toastr.success(
                                'Data berhasil dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                    swal(
                        'Deleted!',
                        'Your imaginary file has been deleted.',
                        'success'
                    );
                } else {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });

        $('#modal_customer').on('hidden.bs.modal', function (e) {
            $(this).find('#CustomerForm')[0].reset();

            $('#name-error').html('');
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
