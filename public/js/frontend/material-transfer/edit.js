let MutationEdit = {
    init: function () {
        $('.material_transfer_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/mutation/material-transfer/' + mutation_uuid + '/items',
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
                },
                {
                    field: 'name',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Expired Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "pivot.note",
                    title: "Remark",
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_item" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Edit" data-item=' +
                            t.uuid + ' data-date=' + t.pivot.expired_at + ' data-quantity=' + t.pivot.quantity + ' data-unit=' + t.unit_id + ' data-remark=' + t.pivot.note + ' data-serial=' + t.pivot.serial_number + '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }

            ]
        });

        $(".modal-footer").on("click", ".add-item", function () {
            let item = $("#item").val();
            let quantity = $("input[name=qty_request]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let note = $("#item_remark").val();
            let serial_numbers = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/material-transfer/" + mutation_uuid + "/item/" + item,
                type: "POST",
                data: {
                    item_id: item,
                    quantity: quantity,
                    exp_date: exp_date,
                    unit_id: unit,
                    serial_no: serial_numbers,
                    note: note,
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

                    let table = $(".material_transfer_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();
                }
            });
        });

        $('.material_transfer_datatable').on('click', '.edit-item', function () {
            let item_uuid = $(this).data('item');
            let unit_id = $(this).data('unit');

            $.ajax({
                url: '/get-items-uuid/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="item"]').empty();

                    $.each(data, function (key, value) {
                        if (key == item_uuid) {
                            $('select[name="item"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="item"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });
            $("#item").attr('disabled', true);

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
            document.getElementById('exp_date').value = $(this).data('date');

            $('.btn-success').addClass('update-item');
            $('.btn-success').removeClass('add-item');
        });

        $(".modal-footer").on("click", ".update-item", function () {
            let item = $("#item").val();
            let quantity = $("input[name=qty_request]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let note = $("#item_remark").val();
            let serial_no = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/material-transfer/" + mutation_uuid + "/item/" + item,
                type: "PUT",
                data: {
                    item_id: item,
                    quantity: quantity,
                    exp_date: exp_date,
                    unit_id: unit,
                    serial_no: serial_no,
                    note: note,
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

                    toastr.success("Item has been updated.", "Success", {
                        timeOut: 5000
                    });

                    let table = $(".material_transfer_datatable").mDatatable();

                    table.originalDataSet = [];
                    table.reload();

                    $('.btn-success').addClass('add-item');
                    $('.btn-success').removeClass('update-item');
                }
            });
        });

        $('.material_transfer_datatable').on('click', '.delete', function () {

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
                            url: '/material-transfer/' + mutation_uuid + '/item/' + $(this).data('uuid'),
                            success: function (data) {
                                toastr.success('Item has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.material_transfer_datatable').mDatatable();

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

        $('.footer').on('click', '.update-mutation', function () {
            let ref_no = $('input[name=ref-no]').val();
            let description = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/material-transfer/' + mutation_uuid,
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
                        toastr.success('Material Transfer has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    MutationEdit.init();
});

$("#item").on("change", function () {
    let item_uuid = $("#item").val();

    $.ajax({
        url: '/get-item-unit-uuid/' + item_uuid,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $('select[name="unit_id"]').empty();

            $('select[name="unit_id"]').append(
                '<option value=""> Select a Unit</option>'
            );

            $.each(data, function (key, value) {
                $('select[name="unit_id"]').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });
});