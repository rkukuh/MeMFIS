var TaskcardPackageModal = {
    init: function () {
        $('.m_datatable2').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-audits',
                        map: function (raw) {
                            var dataSet = raw;

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
                scroll: !1,
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
                    field: 'id',
                    title: '#',
                    width: 50,
                    sortable: !1,
                    textAlign: 'center',
                    name: 'sas',
                    selector: {
                        class: 'm-checkbox--solid m-checkbox--brand'
                    }
                },
                {
                    field: 'event',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                }
            ]
        });

        var simpan = $('.modal-footer').on('click', '.add', function () {
            $('#name-error').html('');
            $('#simpan').text('Simpan');

            var registerForm = $('#CustomerForm');
            var name = $('input[name=name]').val();
            var formData = registerForm.serialize();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/category',
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

                        var table = $('.m_datatable2').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        var edit = $('.m_datatable2').on('click', '.edit', function () {
            $('#button').show();
            $('#simpan').text('Perbarui');

            var triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/category/' + triggerid + '/edit',
                success: function (data) {
                    document.getElementById('id').value = data.id;
                    document.getElementById('name').value = data.name;

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    var errorsHtml = '';
                    var errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        var update = $('.modal-footer').on('click', '.update', function () {
            $('#button').show();
            $('#name-error').html('');
            $('#simpan').text('Perbarui');

            var name = $('input[name=name]').val();
            var triggerid = $('input[name=id]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/category/' + triggerid,
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

                        var table = $('.m_datatable2').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        var show = $('.m_datatable2').on('click', '.show', function () {
            $('#button').hide();
            $('#simpan').text('Perbarui');

            var triggerid = $(this).data('id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/category/' + triggerid,
                success: function (data) {
                    document.getElementById('TitleModalCustomer').innerHTML = 'Detail Customer #ID-' + triggerid;
                    document.getElementById('name').value = data.name;
                    document.getElementById('name').readOnly = true;
                },
                error: function (jqXhr, json, errorThrown) {
                    var errorsHtml = '';
                    var errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        var remove = $('.m_datatable2').on('click', '.delete', function () {
            var triggerid = $(this).data('id');

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
                        url: '/category/' + triggerid + '',
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            var table = $('.m_datatable2').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            var errorsHtml = '';
                            var errors = jqXhr.responseJSON;

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
    TaskcardPackageModal.init();
});
