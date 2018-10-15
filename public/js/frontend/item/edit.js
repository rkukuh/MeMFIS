let Item = {
    init: function () {
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
            columns: [{
                    field: 'uom.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            // t.id +
                            // '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            // t.id +
                            // '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="'+t.uom.item_id+'"' +
                            'data-unit_id="'+t.uom.unit_id+'"'+
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.m_datatable2').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-item-storages/' + code + '/',
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
                    field: 'name',
                    title: 'Storage',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'pivot.max',
                    title: 'Max',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'pivot.min',
                    title: 'Min',
                    sortable: 'asc',
                    filterable: !1,
                    width: 50
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            // t.id +
                            // '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            // t.id +
                            // '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id="'+t.pivot.item_id+'"' +
                            'data-storage_id="'+t.pivot.storage_id+'"'+
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
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


        $('.footer').on('click', '.edit-item', function () {

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
            let uuid = $('input[name=id]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let ppn = $('input[name=ppn]').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/'+uuid+'/',
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
                        location.reload();
                        // photo();
                    }
                }
            });
        });




        let simpan2 = $('.modal-footer').on('click', '.add-uom', function () {
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
                        uom_reset()
                        let table = $('.m_datatable1').mDatatable();
                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });


        let simpan3 = $('.modal-footer').on('click', '.add-stock', function () {
            let code = $('input[name=code]').val();
            $('#name-error').html('');
            let storage = $('#storage').val();
            let min = $('input[name=min]').val();
            let max = $('input[name=max]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-storage',
                data: {
                    _token: $('input[name=_token]').val(),
                    storage: storage,
                    min: min,
                    max: max,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.storage) {
                            $('#storage-error').html(data.errors.storage[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.min) {
                            $('#min-error').html(data.errors.min[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                        if (data.errors.max) {
                            $('#max-error').html(data.errors.max[0]);
                            document.getElementById('storage').value = storage;
                            document.getElementById('min').value = min;
                            document.getElementById('max').value = max;
                        }
                    } else {
                        $('#modal_minmaxstock').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                        minmaxstock_reset();
                        let table = $('.m_datatable2').mDatatable();
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
                        url: '/item-unit/' + triggerid + '/'+ triggerid2,
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable1').mDatatable();
                            table.originalDataSet =[];
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

        let remove_storages = $('.m_datatable2').on('click', '.delete', function () {
            let triggerid = $(this).data('id');
            let triggerid2 = $(this).data('storage_id');
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
                        url: '/item-storage/' + triggerid + '/'+ triggerid2,
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable2').mDatatable();
                            table.originalDataSet =[];
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




    }
};

jQuery(document).ready(function () {
    Item.init();
});
