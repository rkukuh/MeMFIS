let Item = {
    init: function () {
        $('.item_unit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item-unit/' + item_uuid + '/',
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
                    field: 'actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.uom.item_id + '" ' +
                                'data-unit_id="' + t.uom.unit_id + '">' +
                                    '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.item_storage_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-item-storages/' + item_uuid + '/',
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
                    field: 'actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.pivot.item_id + '" ' +
                                'data-storage_id="' + t.pivot.storage_id + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $(document).ready(function () {
            $('.btn-success').removeClass('add');

            document.getElementById('is_ppn').onchange = function () {
                document.getElementById('ppn_amount').disabled = !this.checked;

                if (document.getElementById("is_ppn").checked) {
                    document.getElementById('ppn_amount').value = 10;
                } else {
                    document.getElementById('ppn_amount').value = '';
                }
            };
        });

        $('.footer').on('click', '.reset', function () {
            item_edit_reset();
        });

        $('.footer').on('click', '.edit-item', function () {

            if ($('#tag :selected').length > 0) {
                var selectedtags = [];

                $('#tag :selected').each(function (i, selected) {
                    selectedtags[i] = $(selected).val();
                });
            }

            if (document.getElementById("is_stock").checked) {
                is_stock = 1;
            } else {
                is_stock = 0;
            }

            if (document.getElementById("is_ppn").checked) {
                is_ppn = 1;
            } else {
                is_ppn = 0;
            }

            let uuid = $('input[name=uuid]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let unit = $('#unit_item').val();
            let category = $('#category').val();
            let ppn_amount = $('input[name=ppn_amount]').val();
            let account_code = $('#account_code').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/' + uuid + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description,
                    unit: unit,
                    category: category,
                    is_stock: is_stock,
                    is_ppn: is_ppn,
                    ppn_amount: ppn_amount,
                    account_code: account_code,
                    selectedtags: selectedtags,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-error').html(data.errors.code[0]);
                        }

                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }

                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        if (unit == "Select a Unit") {
                            $('#unit-error').html("The Unit field is required.");
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('barcode').value = barcode;
                        document.getElementById('account_code').value = account_code;

                    } else {
                        $('#code-error').html('');
                        $('#name-error').html('');
                        $('#description-error').html('');
                        $('#barcode-error').html('');
                        $('#item-unit').html();
                        $('#item-storage').html(code);
                        $('input[type=file]').val('');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-uom', function () {
            let unit = $('#unit').val();
            let code = $('input[name=code]').val();
            let uom_quantity = $('input[name=uom_quantity]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item-unit',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    unit: unit,
                    quantity: quantity,
                    uom_quantity: uom_quantity,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);
                        }

                        if (data.errors.uom_quantity) {
                            $('#uom_quantity-error').html(data.errors.uom_quantity[0]);
                        }

                        if (data.errors.unit) {
                            $('#unit-error').html(data.errors.unit[0]);
                        }

                        if (data.errors.unit2) {
                            $('#unit2-error').html(data.errors.unit2[0]);
                        }

                        document.getElementById('unit').value = unit;
                        document.getElementById('quantity').value = quantity;
                        document.getElementById('uom_quantity').value = uom_quantity;
                    } else {
                        $('#modal_uom').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        uom_reset();

                        let table = $('.item_unit_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-stock', function () {
            $('#name-error').html('');

            let code = $('input[name=code]').val();
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
                    code: code,
                    storage: storage,
                    min: min,
                    max: max,
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
                        $('#modal_storage_stock').modal('hide');

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        storage_stock_reset();

                        let table = $('.item_storage_datatable').mDatatable();

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
