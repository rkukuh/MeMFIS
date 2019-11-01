let GseToolReturnedEdit = {
    init: function () {
        $('.gse_tool_returned_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: "/datatables/gse/item/" + gse_uuid,
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
            columns: [
                {
                    field: '#',
                    title: 'No',
                    width:'40',
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
                    width: 150
                },
                {
                    field: 'pivot.serial_number',
                    title: 'Serial Number',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'name',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'pivot.note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_gse_item_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Item" data-item='+t.code+' data-quantity='+t.pivot.quantity+' data-unit='+t.pivot.unit_id+' data-expred='+t.pivot.expired_at+' data-note='+t.pivot.note+' data-description='+t.description+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('select[name="tool"]').on("change", function() {
            let item_uuid = $("#tool").val();

            $.ajax({
                url: '/get-tool-request/'+request_uuid+'/'+item_uuid,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="serial_no"]').empty();

                    $('select[name="serial_no"]').append(
                        '<option value=""> Select Serial Number</option>'
                    );

                    $.each(data, function (key, value) {
                        $('select[name="serial_no"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });

        });

        $('.footer').on('click', '.update-gse', function () {
            let returned_at = $('input[name=date]').val();
            let storage = $('#item_storage_id').val();
            let section = $('input[name=section]').val();
            let returned_by = $('#employee').val();
            let note = $('#note').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/gse/'+gse_uuid,
                type: 'PUT',
                data: {
                    returned_at:returned_at,
                    section:section,
                    storage_id:storage,
                    returned_by:returned_by,
                    note:note,
                },
                success: function (response) {
                    if (response.errors) {
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {

                        toastr.success('GSE has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

        $('.modal-footer').on('click', '.add-item', function () {
            let item_uuid = $("#tool").val();
            let serial_no = $("#serial_no").val();
            let qty = $("#quantity").val();
            let unit_id = $("#unit_tool").val();
            let note = $("#remark").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/gse/'+gse_uuid+'/item/'+item_uuid,
                type: "POST",
                data: {
                    serial_no: serial_no,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                    // serial_numbers: serial_numbers,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#quantity-error').html(response.errors.quantity[0]);
                        }

                    } else {
                        if (response.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_gse_item_add').modal('hide');

                            toastr.success(
                                "GSE's Item has been updated.",
                                "Success",
                                {
                                    timeOut: 5000
                                }
                            );

                            let table = $(".gse_tool_returned_datatable").mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });
        $('.gse_tool_returned_datatable').on('click', '.edit-item', function () {
            let description = "";
            document.getElementById('item-label').innerText = $(this).data('item');
            let unit_id = $(this).data('unit');

            $.ajax({
                url: '/get-units',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;

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

            document.getElementById('qty').value = $(this).data('quantity');
            document.getElementById('note').value = $(this).data('note');

            document.getElementById('uuid').value = $(this).data('uuid');
        });
        $(".modal-footer").on("click", ".update-item", function() {

            let uuid = $("input[name=uuid]").val();
            let exp_date = $("#exp_date").val();
            let qty = $("#qty").val();
            let unit_id = $("#unit_id").val();
            let note = $("#note").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/rir/'+rir_uuid+'/item/'+uuid,
                type: "PUT",
                data: {
                    serial_no: serial_no,
                    quantity: qty,
                    unit_id: unit_id,
                    note: note,
                },
                success: function(response) {
                    if (response.errors) {
                        // if (response.errors.quantity) {
                        //     $('#qty-error').html(response.errors.quantity[0]);
                        // }
                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        //    taskcard_reset();
                        $('#modal_gse_item_edit').modal('hide');

                        toastr.success(
                            "RIR has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".gse_tool_returned_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });

        $('.gse_tool_returned_datatable').on('click', '.delete', function () {

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
                        url: '/rir/' + rir_uuid + '/item/'+$(this).data('uuid'),
                        success: function (data) {
                            toastr.success('Item GSE has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.gse_tool_returned_datatable').mDatatable();

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

    }
};

jQuery(document).ready(function () {
    GseToolReturnedEdit.init();
});
