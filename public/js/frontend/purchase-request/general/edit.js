let PurchaseRequest = {
    init: function() {
        $(".item_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/purchase-request/item/" +
                            pr_uuid +
                            "/general",

                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
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
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                            '<a href="/item/' + t.item.uuid + '">' + t.item.code + "</a>"
                        );
                    }
                },
                {
                    field: "item.name",
                    title: "Item Description",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "stock_avaliable",
                    title: "Stock Available",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "quantity",
                    title: "Request Qty"
                },
                {
                    field: "unit_name",
                    title: "Unit"
                },
                {
                    field: "note",
                    title: "Remark"
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_general" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Item" data-item='+t.item.uuid+' data-item_code='+t.item.code+' data-item_name='+t.item.name+' data-quantity='+t.quantity+' data-unit='+t.item.unit.uuid+' data-remark='+t.note+' data-id=' +
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.id +
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
                url: "/purchase-request-general/"+pr_uuid,
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

        $(".modal-footer").on("click", ".add-item", function() {
            let item = $("#material").val();
            let quantity = $("input[name=qty]").val();
            let unit = $("#unit_material").val();
            let remark = $("#remark").val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/purchase-request/" + pr_uuid + "/item/" + item,
                type: "post",
                data: {
                    item_id: item,
                    quantity: quantity,
                    unit_id: unit,
                    remark: remark,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#quantity-error').html(response.errors.quantity[0]);
                        }
                        // document.getElementById('account_code').value = account_code;

                    } else {
                        if (response.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {
                            $('#modal_general').modal('hide');

                            $('#modal_general').on('hidden.bs.modal', function (e) {
                                $(this)
                                .find("input,textarea")
                                    .val('')
                                    .end()
                                .find("input[type=checkbox], input[type=radio]")
                                    .prop("checked", "")
                                    .end()
                                // .find("select")
                                //     .select2('val','All')
                                //     .end();
                            })

                            toastr.success("Item has been added.", "Success", {
                                timeOut: 5000
                            });

                            let table = $(".item_datatable").mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        }
                    }
                }
            });
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            let unit_uuid = $(this).data('unit');

            let code = $(this).data('item_code');
            let name = $(this).data('item_name');

            $('.input-item-uuid').val($(this).data('item'));

            $('.search-item').html(code + " - " + name);

            $("#item").attr('disabled', true);

            $.ajax({
                url: '/get-units/'+$(this).data('item'),
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('select[name="unit_material"]').empty();

                    $('select[name="unit_material"]').append(
                        '<option value=""> Select a Unit</option>'
                    );

                    $.each(data, function (key, value) {
                        // $('select[name="unit_material"]').append(
                        //     '<option value="' + key + '">' + value + '</option>'
                        // );
                        if (key == unit_uuid) {
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

            // $.ajax({
            //     url: '/get-item-unit-uuid/'+ $(this).data('item'),
            //     type: 'GET',
            //     dataType: 'json',
            //     success: function (data) {
            //         let index = 1;

            //         $('select[name="unit_id"]').empty();

            //         $.each(data, function (key, value) {
            //             if (key == unit_id) {
            //                 $('select[name="unit_id"]').append(
            //                     '<option value="' + key + '" selected>' + value + '</option>'
            //                 );
            //             } else {
            //                 $('select[name="unit_id"]').append(
            //                     '<option value="' + key + '">' + value + '</option>'
            //                 );
            //             }

            //         });
            //     }
            // });

            // document.getElementById('material').innerText = $(this).data('item');
            document.getElementById('qty').value = $(this).data('quantity');
            document.getElementById('uuid').value = $(this).data('id');
            document.getElementById('remark').value = $(this).data('remark');

            $('.btn-success').addClass('update-item');
            $('.btn-success').removeClass('add-item');
        });

        $(".modal-footer").on("click", ".update-item", function() {
            let item = $("#material").val();
            let uuid = $("input[name=uuid]").val();
            let quantity = $("input[name=qty]").val();
            let unit = $("#unit_material").val();
            let remark = $("#remark").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: '/purchase-request/general/item/'+uuid,
                type: "PUT",
                data: {
                    item_id: item,
                    quantity: quantity,
                    unit_id: unit,
                    note: remark,
                },
                success: function(response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        if (response.title == "Danger") {
                            toastr.error("Item already exists!", "Error", {
                                timeOut: 5000
                            });
                        } else {

                            //    taskcard_reset();
                            $('#modal_general').modal('hide');

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

                            $('.btn-success').removeClass('update-item');
                            $('.btn-success').addClass('add-item');
                        }
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
                        url: '/purchase-request/item/'+$(this).data('id'),
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

jQuery(document).ready(function() {
    PurchaseRequest.init();
});
