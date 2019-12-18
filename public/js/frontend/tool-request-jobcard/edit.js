let ToolRequestEdit = {
    init: function () {

        $('#jc_ref_no').on('click', function () {
            $('#ref_project').prop("disabled", true);
            $('#ref_jobcard').removeAttr("disabled");
        });

        $('#project_ref_no').on('click', function () {
            $('#ref_jobcard').prop("disabled", true);
            $('#ref_project').removeAttr("disabled");
        });

        $('.tool_request_project_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item-request/tool/' + request_uuid + '/items',
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
                    field: 'description',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Expired Date',
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
                    field: 'note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool_request" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Edit" data-item=' +
                            t.uuid + ' data-date=' + t.pivot.expired_at + ' data-quantity=' + t.pivot.quantity + ' data-unit=' + t.unit_id + ' data-serial=' + t.pivot.serial_number + ' data-remark=' + t.pivot.description + '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-exchange"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.tool_request_project_datatable').on('click', '.edit-item', function () {
            let item_uuid = $(this).data('item');
            let unit_id = $(this).data('unit');

            $.ajax({
                url: '/get-tools-uuid/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="tool"]').empty();

                    $.each(data, function (key, value) {
                        if (key == item_uuid) {
                            $('select[name="tool"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="tool"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });
            $("#tool").attr('disabled', true);

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
            let remark = $(this).data('remark');

            if (remark === null) {
                document.getElementById('item_remark').value = '';
            } else {
                document.getElementById('item_remark').value = $(this).data('remark');
            }

            document.getElementById('serial_no').value = $(this).data('serial');

            $('.btn-success').addClass('update-item');
            $('.btn-success').removeClass('add-item');
        });

        $(".modal-footer").on("click", ".update-item", function () {
            let tool = $("#tool").val();
            let quantity = $("input[name=qty_request]").val();
            let exp_date = $("#exp_date").val();
            let unit = $("#unit_id").val();
            let remark = $("#remark").val();
            let serial_no = $("#serial_no").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/item-request/tool-request-jobcard/" + request_uuid + "/item/" + tool,
                type: "PUT",
                data: {
                    item_id: tool,
                    quantity: quantity,
                    expired_at: exp_date,
                    unit_id: unit,
                    serial_no: serial_no,
                    remark: remark,
                },
                success: function (response) {
                    $('#modal_tool_request').modal('hide');

                    $('#modal_tool_request').on('hidden.bs.modal', function (e) {
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

                    let table = $('.tool_request_project_datatable').mDatatable();

                    table.originalDataSet = [];
                    table.reload();

                    $('.btn-success').addClass('add-item');
                    $('.btn-success').removeClass('update-item');
                }
            });
        });

        $('.tool_request_project_datatable').on('click', '.delete', function () {

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
                            url: '/item-request/tool-request-jobcard/' + request_uuid + '/item/' + $(this).data('uuid'),
                            success: function (data) {
                                toastr.success('Item has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.tool_request_project_datatable').mDatatable();

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

        $('.footer').on('click', '.update-item-request', function () {
            let note = $('#description').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();
            let received_by = $('#received-by').val();
            let jc_no = $("#ref_jobcard").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/item-request/tool-request-jobcard/' + request_uuid,
                type: 'PUT',
                data: {
                    jc_no: jc_no,
                    storage_id: storage_id,
                    requested_at: date,
                    note: note,
                    section: section_code,
                    received_by: received_by
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors)
                    } else {
                        toastr.success('Item Request has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    ToolRequestEdit.init();
});
