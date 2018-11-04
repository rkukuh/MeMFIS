let ItemUnit = {
    init: function () {

        load_table_uom = function () {
            let code = $('input[name=code]').val();

            $('.m_datatable1').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/get-uom/' + code + '/',
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
                        field: 'uom.quantity',
                        title: 'Quantity',
                        sortable: 'asc',
                        filterable: !1,
                        width: 100
                    },
                    {
                        field: 'name',
                        title: 'Unit',
                        sortable: 'asc',
                        filterable: !1,
                        width: 250
                    },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        sortable: !1,
                        width: 100,
                        overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="' + t.uom.item_id + '"' +
                                'data-unit_id="' + t.uom.unit_id + '"' +
                                ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                ]
            });
        };

        $('.modal-footer').on('click', '.reset', function () {
            uom_reset();
        });


        let simpan = $('.modal-footer').on('click', '.add-uom', function () {
            let code = $('input[name=code]').val();
            let qty = $('input[name=qty]').val();
            let qty2 = $('input[name=qty2]').val();
            let unit = $('#unit').val();
            let unit2 = $('#unit2').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-unit',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    qty: qty,
                    qty2: qty2,
                    unit: unit,
                    unit2: unit2
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.qty) {
                            $('#qty-error').html(data.errors.qty[0]);

                        }
                        if (data.errors.qty2) {
                            $('#qty2-error').html(data.errors.qty2[0]);

                        }
                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);

                        }
                        if (data.errors.unit2) {
                            $('#unit2-error').html(data.errors.unit2[0]);

                        }
                        document.getElementById('qty').value = qty;
                        document.getElementById('qty2').value = qty2;
                        document.getElementById('unit').value = unit;
                        document.getElementById('unit2').value = unit2;
                    } else {
                        $('#modal_uom').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        load_table_uom();
                        uom_reset()
                        let table = $('.m_datatable1').mDatatable();
                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });

        let remove_uom = $('.m_datatable1').on('click', '.delete', function () {
            let triggerid = $(this).data('id');
            let triggerid2 = $(this).data('unit_id');
            // alert(triggerid);

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
                        url: '/item-unit/' + triggerid + '/' + triggerid2,
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable1').mDatatable();
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
    ItemUnit.init();
});
