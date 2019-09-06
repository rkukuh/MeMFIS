let PurchaseRequest = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/purchase-request/item/'+pr_uuid+'/general',

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
                    field: "code",
                    title: "Part Number",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<a href="/item/' + t.uuid + '">' + t.code + "</a>"
                        );
                    }
                },
                {
                    field: "name",
                    title: "Item Description",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: '',
                    title: 'Project Requirement Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "",
                    title: "Stock Available",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Request Qty"
                },
                {
                    field: "pivot.unit_id",
                    title: "Unit"
                },
                {
                    field: "pivot.note",
                    title: "Remark"
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_general_update" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Item" data-item='+t.code+' data-quantity='+t.pivot.quantity+' data-unit='+t.pivot.unit_id+' data-remark='+t.pivot.note+' data-uuid=' +
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


        $(".footer").on("click", ".update-pr", function() {
            let date = $('input[name=date]').val();
            let date_required = $('input[name=date-required]').val();
            let description = $('#description').val();
            let type_id = $('#purchase-request-type').val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/purchase-request-project/"+pr_uuid,
                type: "PUT",
                data: {
                    requested_at:date,
                    required_at:date_required,
                    description:description,
                    type_id:type_id,
                },
                success: function(response) {
                    if (response.errors) {
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        //    taskcard_reset();

                        toastr.success(
                            "Purchase Request has been created.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                    }
                }
            });
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            let unit_id = $(this).data('unit');

            $('select[name="unit_material"]').empty();

            $.ajax({
                url: '/get-units',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let index = 1;

                    $('select[name="unit_material"]').empty();

                    $.each(data, function (key, value) {
                        if (key == unit_id) {
                            $('select[name="unit_material"]').append(
                                '<option value="' + key + '" selected>' + value + '</option>'
                            );
                        } else {
                            $('select[name="unit_material"]').append(
                                '<option value="' + key + '">' + value + '</option>'
                            );
                        }

                    });
                }
            });

            document.getElementById('material').innerText = $(this).data('item');
            document.getElementById('qty-material').value = $(this).data('quantity');
            document.getElementById('uuid').value = $(this).data('uuid');
            document.getElementById('remark-material').value = $(this).data('remark');
        });

        $(".modal-footer").on("click", ".update-item", function() {
            let uuid = $("input[name=uuid]").val();
            let quantity = $("#qty-material").val();
            let unit_id = $("#unit_material").val();
            let note = $("#remark-material").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/purchase-request-project/'+pr_uuid+'/item/'+uuid,
                type: "PUT",
                data: {
                    quantity: quantity,
                    unit_id: unit_id,
                    note: note,
                },
                success: function(response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        //    taskcard_reset();
                        $('#modal_general_update').modal('hide');

                        toastr.success(
                            "Item has been updated.",
                            "Success",
                            {
                                timeOut: 5000
                            }
                        );

                        let table = $(".item_datatable").mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
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
                        url: '/purchase-request/' + pr_uuid + '/item/'+$(this).data('uuid'),
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
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

    }
};

jQuery(document).ready(function () {
    PurchaseRequest.init();
});
