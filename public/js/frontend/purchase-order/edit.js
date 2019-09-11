let PurchaseOrder = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url:
                        "/datatables/purchase-order/item/" +
                        po_uuid ,

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
            columns: [{
                field: 'code',
                title: 'Part No.',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                }
            },
            {
                field: 'name',
                title: 'Material Name',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Quantity',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.unit_id',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.price',
                title: 'Price',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.subtotal_before_discount',
                title: 'Sub Total',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.discount_amount',
                title: 'Disc PR',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.discount_percentage',
                title: 'Disc %',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.subtotal_after_discount',
                title: 'Total',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: "pivot.note",
                title: "Note",
            },
            {
                field: 'actions',
                sortable: !1,
                width: 145,
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_check" type="button" href="#" class="m-badge m-badge--brand m-badge--wide" title="Edit" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\tCheck\t\t\t\t\t\t</button>\t\t\t\t\t\t'+

                        '<button data-toggle="modal" data-target="#modal_po" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-item" title="Edit" data-uuid="' + t.uuid +'">' +
                            '<i class="la la-pencil"></i>' +
                        '</button>'+
                        '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                        t.uuid +
                        ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t\t'
                    );
                }
            }
            ]
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            $.ajax({
                url: '/purchase-order/'+po_uuid+'/item/'+ $(this).data('uuid') +'/edit',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.ajax({
                        url: '/get-units',
                        type: 'GET',
                        dataType: 'json',
                        success: function (data2) {
                            let index = 1;

                            $('select[name="unit_id"]').empty();

                            $.each(data2, function (key, value) {
                                if (key == data.pivot.unit_id) {
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

                    $('select[name="discount-type"]').empty();

                    // if(data.pivot.discount_type == "percentage"){
                    //     $('select[name^="discount-type"]').append(
                    //         '<option value="amount">Amount</option>',
                    //         '<option value="percentage" selected>Percentage</option>'
                    //     );
                    // }else{
                    //     $('select[name^="discount-type"]').append(
                    //         '<option value="amount" selected>Amount</option>',
                    //         '<option value="percentage">Percentage</option>'
                    //     );
                    // }

                    document.getElementById('item_name').innerText = data.name;
                    document.getElementById('uuid').value = data.uuid;
                    document.getElementById('qty').value = data.pivot.quantity;
                    document.getElementById('price').value = data.pivot.price;
                    document.getElementById('discount').value = data.pivot.discount_value;
                    document.getElementById('remark_material').value = data.pivot.note;

                }
            });
        });

        $('.modal-footer').on('click', '.update-item', function () {
            let uuid = $('#uuid').val();
            let qty = $('#qty').val();
            let unit_id = $('#unit_id').val();
            let price = $('#price').val();
            let ppn = $('#ppn').val();
            let discount = $('#discount').val();
            // let discount_type = $('#discount-type').val();
            let remark_material = $('#remark_material').val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/purchase-order/"+po_uuid+"/item/"+uuid,
                type: "PUT",
                data: {
                    quantity:qty,
                    unit_id:unit_id,
                    price:price,
                    ppn:ppn,
                    // discount:discount,
                    // discount_type:discount_type,
                    note:remark_material,
                },
                success: function(response) {
                    if (response.errors) {
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;
                    } else {
                        $('#modal_po').modal('hide');

                        toastr.success(
                            "Purchase Request has been created.",
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

        $('.footer').on('click', '.update-po', function () {
            let currency = $('#currency').val();
            let date = $('input[name=date]').val();
            let valid_until = $('input[name=valid_until]').val();
            let exchange = $('input[name=exchange]').val();
            let pr_uuid = $('input[name=ref-pr]').val();
            let date_shipping = $('input[name=date_shipping]').val();
            let vendor = $('#vendor').val();
            let shipping_address = $('#shipping_address').val();
            // let top = $('#shipping_address').val();
            let description = $('#description').val();
            let top = '';
            let top_day_amount = $('#top_day_amount').val();
            let top_start_at = $('#top_start_at').val();

            if($('#cash').is(":checked")){
                top = 'cash';

            }
            else if($('#by-date').is(":checked")){
                top = 'by-date';
            }


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-order/'+po_uuid,
                type: 'PUT',
                data: {
                    currency_id:currency,
                    ordered_at:date,
                    valid_until:valid_until,
                    exchange_rate:exchange,
                    purchase_request_id:pr_uuid,
                    ship_at:date_shipping,
                    vendor_id:vendor,
                    top_type:top,
                    shipping_address:shipping_address,
                    top_day_amount:top_day_amount,
                    top_start_at:top_start_at,
                    description:description,
                },
                success: function (response) {
                    if (response.errors) {
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Purchase Order has been updated.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });


        $(document).ready(function () {
            $('#cash').on('click', function () {

                $('#top_day_amount').prop("disabled", true);
                $('#top_start_at').prop("disabled", true);
                $('#top_day_amount').val("");
                $('#top_start_at').val("");

            });
            $('#by-date').on('click', function () {
                $('#top_day_amount').removeAttr("disabled");
                $('#top_start_at').removeAttr("disabled");
            });
        });

        $('select[name="currency"]').on('change', function () {
            let exchange_id = this.options[this.selectedIndex].innerHTML;
            let exchange_rate = $('input[name=exchange]');
            if (exchange_id.includes("Rp")) {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", true);
            } else {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", false);
            }
        });
        $('.footer').on('click', '.add-po', function () {
            let number = $('input[name=number]').val();
            let currency = $('#currency').val();
            // let project_id = $('input[name=project]').val();
            let date = $('input[name=date]').val();
            let valid_until = $('input[name=valid_until]').val();
            let exchange = $('input[name=exchange]').val();
            let pr_uuid = $('input[name=ref-pr]').val();
            let date_shipping = $('input[name=date_shipping]').val();
            let vendor = $('#vendor').val();
            let shipping_address = $('#shipping_address').val();
            // let top = $('#shipping_address').val();
            let description = $('#description').val();
            let top = '';
            let top_day_amount = $('#top_day_amount').val();
            let top_start_at = $('#top_start_at').val();

            if($('#cash').is(":checked")){
                top = 'cash';

            }
            else if($('#by-date').is(":checked")){
                top = 'by-date';
            }


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-order',
                type: 'POST',
                data: {
                    number:number,
                    currency_id:currency,
                    ordered_at:date,
                    valid_until:valid_until,
                    exchange_rate:exchange,
                    purchase_request_id:pr_uuid,
                    ship_at:date_shipping,
                    vendor_id:vendor,
                    top_type:top,
                    shipping_address:shipping_address,
                    top_day_amount:top_day_amount,
                    top_start_at:top_start_at,
                    description:description,
                },
                success: function (response) {
                    if (response.errors) {
                        // console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Purchase Order has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-order/'+response.uuid+'/edit';
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
                        url: '/purchase-order/' + po_uuid + '/item/'+$(this).data('uuid'),
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
    PurchaseOrder.init();
});