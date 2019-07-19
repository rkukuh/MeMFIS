let Item = {
    init: function () {
        $('.item_unit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item/' + item_uuid + '/units',
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
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
                },
                {
                    field: 'convension',
                    title: 'Conversion Rate',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        let unit = $("#unit_id option:selected").text();
                        return +t.uom.quantity+' '+unit+' = 1'+t.name
                    }
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                            'data-item_uuid="' + $('#item_uuid').val() + '" ' +
                            'data-unit_id="' + t.uuid + '">' +
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
                        url: '/datatables/item/' + item_uuid + '/storages',
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
                    width: 250
                },
                {
                    field: 'pivot.min',
                    title: 'Min',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.max',
                    title: 'Max',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button href="#" data-toggle="modal" data-target="#modal_storage_stock"  class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" ' +
                            'data-min="' + t.pivot.min + '" ' +
                            'data-max="' + t.pivot.max + '" ' +
                            'data-item_uuid="' + $('#item_uuid').val() + '" ' +
                            'data-storage_id="' + t.pivot.storage_id + '">' +
                            '<i class="la la-pencil"></i>' +
                            '</button>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                            'data-item_uuid="' + $('#item_uuid').val() + '" ' +
                            'data-storage_uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        errorMessage = function () {
            $('#code-error').html('');
            $('#name-error').html('');
            $('#unit-error').html('');
            $('#category-error').html('');
            $('#ppn_amount-error').html('');
        };

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

            $('.reset-uom').removeClass('reset');
            $('.reset-storage').removeClass('reset');

        });

        $(document).ready(function () {
            let category = $("#category option:selected").text()
            if(category.trim() == "Service".trim()){
                $("#is_stock").prop("checked", false);
                $("#is_stock").attr("disabled", true)
            }
        });

        $(document).ready(function () {
            $('select[name="category"]').on('change', function () {
                if (this.options[this.selectedIndex].text == "Service") {
                $("#is_stock").prop("checked", false);
                $("#is_stock").attr("disabled", true)
                } else {
                    $("#is_stock").attr("disabled", false)
                }
            });
        });

        $('.reset-uom').on('click', function () {
            document.getElementById('uom_quantity').value = '';

            $('#item_unit_id').select2('val', 'All');

            $('#uom_quantity-error').html('');
            $('#item_unit-error').html('');
        });

        $('.reset-storage').on('click', function () {
            document.getElementById('min').value = '';
            document.getElementById('max').value = '';

            $('#item_storage_id').select2('val', 'All');

            $('#storage-error').html('');
            $('#min-error').html('');
            $('#max-error').html('');
        });

        $('.footer').on('click', '.reset', function () {
            item_edit_reset();
        });

        $('.footer').on('click', '.edit-item', function () {
            errorMessage();

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

            let item_uuid = $('input[name=item_uuid]').val();
            let code = $('input[name=code]').val();
            let name = $('input[name=name]').val();
            let description = $('#description').val();
            let barcode = $('input[name=barcode]').val();
            let unit_id = $('#unit_id').val();
            let category = $('#category').val();
            let manufacturer_id = $('#manufacturer_id').val();
            let ppn_amount = $('input[name=ppn_amount]').val();
            let account_code = $('#account_code').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/item/' + item_uuid + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    code: code,
                    name: name,
                    description: description,
                    unit_id: unit_id,
                    category: category,
                    manufacturer_id: manufacturer_id,
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

                        if (data.errors.unit_id) {
                            $('#unit-error').html(data.errors.unit_id[0]);
                        }

                        if (data.errors.category) {
                            $('#category-error').html(data.errors.category[0]);
                        }

                        if (data.errors.ppn_amount) {
                            $('#ppn_amount-error').html(data.errors.ppn_amount[0]);
                        }

                        document.getElementById('code').value = code;
                        document.getElementById('name').value = name;
                        document.getElementById('description').value = description;
                        document.getElementById('barcode').value = barcode;
                        document.getElementById('account_code').value = account_code;

                    } else {
                        toastr.success('Material has been updated.', 'Success', {
                            timeOut: 5000
                        });
                        errorMessage();
                        $('#item-unit').html();
                        $('#item-storage').html(code);
                        $('input[type=file]').val('');

                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-category', function () {
            $('#name-error').html('');
            $('#simpan').text('Simpan');

            let code = $('input[name=code_category]').val();
            let name = $('input[name=name_category]').val();
            let description = $('#description_category').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/category-item',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                    description: description,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.code) {
                            $('#code-category-error').html(data.errors.code[0]);
                        }

                        if (data.errors.name) {
                            $('#name-category-error').html(data.errors.name[0]);
                        }
                    } else {
                        $('#modal_category').modal('hide');

                        toastr.success('Category has been created.', 'Success', {
                            timeOut: 5000
                        });

                        item_edit_reset();
                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-manufacturer', function () {
            let name = $('input[name=name_manufacturer]').val();
            let code = $('input[name=code_manufacturer]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/manufacturer',
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    code: code,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name_manufacturer-error').html(data.errors.name[0]);

                        }
                        if (data.errors.code) {
                            $('#code_manufacturer-error').html(data.errors.code[0]);

                        }
                        document.getElementById('code_manufacturer').value = code;
                        document.getElementById('name_manufacturer').value = name;

                    } else {
                        $('#modal_manufacturer').modal('hide');

                        toastr.success('Manufacturer has been created.', 'Success', {
                            timeOut: 5000
                        });

                        item_edit_reset();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Item.init();
});
