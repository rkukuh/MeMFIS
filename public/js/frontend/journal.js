let Category = {
    init: function () {
        $('.m_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-journals',
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
            columns: [
                {
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    width: 60
                },
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'type_id',
                    title: 'Type',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'level',
                    title: 'Level',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_journal" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill  delete" href="#" data-id=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t    \t'
                        );
                    }
                }
            ]
        });

        $(document).ready(function () {
            let select = document.getElementById('type');

            $.ajax({
                url: '/type',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let angka = 1;

                    $('select[name="type"]').empty();

                    $.each(data, function (key, value) {
                        if (angka == 1) {
                            $('select[name="type"]').append(
                                '<option> Select a Type</option>'
                            );
                            angka = 0;
                        }
                        $('select[name="type"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });
        });

        let save = $('.align-items-center').on('click', '.btn-primary', function () {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/submit-button',
                success: function (data) {
                    $('#button-div').html(data);

                }
            });
            
            $.ajax({
                url: '/type',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let angka = 1;

                    $('select[name="level"]').empty();

                    $.each(data, function (key, value) {
                        if (angka == 1) {
                            $('select[name="level"]').append(
                                '<option> Select a Level</option>'
                            );

                            angka = 0;
                        }

                        $('select[name="level"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });


            document.getElementById('code').value = "";
            document.getElementById('name').value = "";
            document.getElementById('type').value = "";
            document.getElementById('level').value = "";
            document.getElementById('description').value = "";

        });


        $(document).ready(function () {
            let select = document.getElementById('level');

            $.ajax({
                url: '/type',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let angka = 1;

                    $('select[name="level"]').empty();

                    $.each(data, function (key, value) {
                        if (angka == 1) {
                            $('select[name="level"]').append(
                                '<option> Select a Level</option>'
                            );

                            angka = 0;
                        }

                        $('select[name="level"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });
        });

        let simpan = $('.modal-footer').on('click', '.add', function () {
            $('#simpan').text('Simpan');

            let type = $('#type').val();
            let level = $('#level').val();
            let registerForm = $('#CustomerForm');
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let formData = registerForm.serialize();
            let description = $('#description').val();

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


                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;

                            document.getElementById('description').value = description;
                        }


                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;

                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;

                        }

                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.level) {
                            $('#level-error').html(data.errors.level[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }
                    } else {
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

        let edit = $('.m_datatable').on('click', '.edit', function () {
            $('#button').show();
            $('#simpan').text('Perbarui');

            let triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/journal/' + triggerid + '/edit',
                success: function (data) {
                    let select = document.getElementById('type');

                    $('select[name="type"]').append(
                        '<option value="0" selected>Edit Type</option>'
                    );

                    // FIXME: 'select' has already been declared.
                    // let select = document.getElementById('level');

                    $('select[name="level"]').append(
                        '<option value="0" selected> Edit Level</option>'
                    );

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'get',
                        url: '/update-button',
                        success: function (data) {
                            $('#button-div').html(data);

                        }
                    });

                    document.getElementById('id').value = data.uuid;
                    document.getElementById('code').value = data.code;
                    document.getElementById('name').value = data.name;
                    document.getElementById('description').value = data.description;
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#journal-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            $('#button').show();
            $('#name-error').html('');
            $('#simpan').text('Perbarui');

            let type = $('#type').val();
            let level = $('#level').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let triggerid = $('input[name=id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/journal/' + triggerid,
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

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.level) {
                            $('#level-error').html(data.errors.level[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);

                            document.getElementById('code').value = code;
                            document.getElementById('name').value = name;
                            document.getElementById('type').value = type;
                            document.getElementById('level').value = level;
                            document.getElementById('description').value = description;
                        }
                    } else {
                        $('#modal_journal').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        let table = $('.m_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#type-error').html('');
                        $('#level-error').html('');
                        $('#description-error').html('');
                    }
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

                    alert(triggerid);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/journal/' + triggerid + '',
                        success: function (data) {
                            toastr.success(
                                'Data berhasil dihapus.',
                                'Sukses', {
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
    Category.init();
});
