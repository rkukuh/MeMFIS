let InventoryOutCreate = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/inventory-out/material/' + inventoryout_uuid + '/items',
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
                    field: '#',
                    title: 'No',
                    width: '40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'code',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/' + t.uuid + '">' + t.code + "</a>"
                    }
                },
                {
                    field: 'pivot.serial_number',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.serial_number
                    }
                },
                {
                    field: 'description',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.description
                    }
                },
                {
                    field: 'expired_at',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.expired_at
                    }
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.pivot.quantity
                    }
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.unit_name
                    }
                },
                {
                    field: "pivot.description",
                    title: "Remark",
                    template: function (t) {
                        return t.pivot.description
                    }
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Edit" data-item=' +
                            t.uuid + ' data-date='+ t.pivot.expired_at +' data-quantity=' + t.pivot.quantity + ' data-unit=' + t.unit_id + ' data-serial='+ t.pivot.serial_number +' data-remark=' + t.pivot.description + '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }

            ]
        });

        $(".modal-footer").on("click", ".add-item", function () {
            let material = $("#material").val();
            let quantity = $("input[name=qty_request]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let remark = $("#remark").val();
            let serial_no = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/inventory-out/material/" + inventoryout_uuid + "/item/" + material,
                type: "POST",
                data: {
                    item_id: material,
                    quantity: quantity,
                    expired_at: exp_date,
                    unit_id: unit,
                    serial_no: serial_no,
                    remark: remark,
                },
                success: function (response) {
                    $('#modal_item').modal('hide');

                    $('#modal_item').on('hidden.bs.modal', function (e) {
                        $(this)
                            .find("input,textarea")
                            .val('')
                            .end()
                            .find("select")
                            .select2('val', 'All')
                            .end();
                    });

                    toastr.success("Item has been added.", "Success", {
                        timeOut: 5000
                    });

                    let table = $(".item_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();
                }
            });
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            let item_uuid = $(this).data('item');
            let unit_id = $(this).data('unit');

            $.ajax({
                url: '/get-materials-uuid/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="material"]').empty();

                    $.each(data, function (key, value) {
                        if (key == item_uuid) {
                            $('select[name="material"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="material"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });
            $("#material").attr('disabled', true);

            $.ajax({
                url: '/get-item-unit-uuid/' + $(this).data('item'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="unit_id"]').empty();

                    $.each(data, function (key, value) {
                        if (key == unit_id) {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="unit_id"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });

            document.getElementById('qty_request').value = $(this).data('quantity');
            document.getElementById('uuid').value = $(this).data('uuid');
            document.getElementById('item_remark').value = $(this).data('remark');
            document.getElementById('serial_no').value = $(this).data('serial');
            document.getElementById('exp_date').value = $(this).data('date');

            $('.btn-success').addClass('update-item');
            $('.btn-success').removeClass('add-item');
        });

        $(".modal-footer").on("click", ".update-item", function () {
            let material = $("#material").val();
            let quantity = $("input[name=qty_request]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let remark = $("#remark").val();
            let serial_no = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/inventory-out/material/" + inventoryout_uuid + "/item/" + material,
                type: "PUT",
                data: {
                    item_id: material,
                    quantity: quantity,
                    expired_at: exp_date,
                    unit_id: unit,
                    serial_no: serial_no,
                    remark: remark,
                },
                success: function (response) {
                    $('#modal_item').modal('hide');

                    $('#modal_item').on('hidden.bs.modal', function (e) {
                        $(this)
                            .find("input,textarea")
                            .val('')
                            .end()
                            .find("select")
                            .select2('val', 'All')
                            .end();
                    });

                    toastr.success("Item has been added.", "Success", {
                        timeOut: 5000
                    });

                    let table = $(".item_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();

                    $('.btn-success').addClass('add-item');
                    $('.btn-success').removeClass('update-item');
                }
            });
        });

        $('.item_datatable').on('click', '.delete', function () {

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
                .then(result => {
                    if (result.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'
                                )
                            },
                            type: 'DELETE',
                            url: '/inventory-out/material/' + inventoryout_uuid + '/item/' + $(this).data('uuid'),
                            success: function (data) {
                                toastr.success('Item has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.item_datatable').mDatatable();

                                table.originalDataSet = [];
                                table.reload();
                            },
                            error: function (jqXhr, json, errorThrown) {
                                let errors = jqXhr.responseJSON;

                                $.each(errors.errors, function (index, value) {
                                    $('#delete-error').html(value);
                                });
                            }
                        });
                    }
                });
        });

        $('.footer').on('click', '.update-inventory-out', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory-out/material/' + inventoryout_uuid,
                type: 'PUT',
                data: {
                    ref_no: ref_no,
                    storage_id: storage_id,
                    inventoried_at: date,
                    description: description,
                    section: section_code,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('InventoryOut has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    InventoryOutCreate.init();
});

$("#material").change(function() {

    let item_uuid = $("#material").val();

    $.ajax({
        url: '/get-serial-number/' + item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="serial_no"]').empty();

            $('select[name="serial_no"]').append(
                '<option value=""> Select a Serial Number</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="serial_no"]').append(
                    '<option value="' + value + '">' + value + '</option>'
                );
            });
        }
    });
});

$("#serial_no").change(function() {
    if ($("#serial_no").val() !== '') {
        $("input[name=qty_request]").val(1);
        $("input[name=qty_request]").prop('disabled', true);
        $('#unit_id').prop('disabled', true);
    } else {
        $("input[name=qty_request]").prop('disabled', false);
        $('#unit_id').prop('disabled', false);
    }
});