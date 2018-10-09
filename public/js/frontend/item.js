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
                serverFiltering: !0,
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
                    width: 60
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
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.id +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

            $(document).ready(function () {
                $('.btn-success').removeClass('add');

                // if(document.getElementById("isppn").checked){
                //     document.getElementById('isppn').removeAttribute('disabled');
                // }

            });


            $('.checkbox').on('click', '#isppn', function () {
                    $('.ppn').removeAttr("disabled");
            });

            $('.footer').on('click', '.add-item', function () {
            
            if(document.getElementById("isstock").checked){
                isstock = 1;
            }
            else{
                isstock = 0;
            }

            if(document.getElementById("isppn").checked){
                isppn = 1;
            }
            else{
                isppn = 0;
            }
            let accountcode2 = $('#accountcode2').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let ppn = $('input[name=ppn]').val();


            var fd = new FormData();
            // fd.append( "fileInput", $("#poster")[0].files[0]);
            fd.append("code", code);
            fd.append("name", name);
            fd.append("description", description);
            fd.append("barcode", barcode);
            fd.append("accountcode", accountcode2);
            fd.append("isstock", isstock);
            fd.append("isppn", isppn);
            fd.append("ppn", ppn);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                type: 'post',
                url: '/item',
                data : fd,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('description').value = description;
                            document.getElementById('barcode').value = barcode;
                            document.getElementById('accountcode2').value = accountcode2;
                        }


                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('description').value = description;
                            document.getElementById('barcode').value = barcode;
                            document.getElementById('accountcode2').value = accountcode2;
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.type[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('description').value = description;
                            document.getElementById('barcode').value = barcode;
                            document.getElementById('accountcode2').value = accountcode2;
                        }
                        if (data.errors.barcode) {
                            $('#barcode-error').html(data.errors.barcode[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('description').value = description;
                            document.getElementById('barcode').value = barcode;
                            document.getElementById('accountcode2').value = accountcode2;
                        }
                        if (data.errors.accountcode) {
                            $('#description-error').html(data.errors.barcode[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('description').value = description;
                            document.getElementById('barcode').value = barcode;
                            document.getElementById('accountcode2').value = accountcode2;
                        }
                    } else {

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        // document.getElementById('poster-label').innerHTML = '';
                        $('input[type=file]').val("") ;
                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#description-error').html('');
                        $('#barcode-error').html('');
                        document.getElementById('item-uom').removeAttribute('disabled');
                        document.getElementById('item-minmaxstock').removeAttribute('disabled');  
                        $('#item-storage').html(code);          
                        $('#item-unit').html(code);          
                    }
                }
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
