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


                            let subtotal = discount = grandtotal = 0;
                            $.each(dataSet, function( index, data ) {
                                if(data.subtotal_before_discount){
                                    discount += parseFloat(data.discount_amount);
                                }
                                subtotal += parseFloat(data.pivot.subtotal_before_discount);
                                grandtotal += parseFloat(data.pivot.subtotal_before_discount);
                        });

                            grandtotal -= discount;
                            $("#sub_total").html(ForeignFormatter.format(subtotal));
                            $("#sub_total").val(subtotal);
                            $("#total_discount").html(ForeignFormatter.format(discount));
                            $("#total_discount").val(discount);
                            $("#grand_total").html(ForeignFormatter.format(grandtotal));
                            $("#grand_total").val(grandtotal);
                            $("#grand_total_rupiah").html(IDRformatter.format(grandtotal*exchange_rate));
                            $("#grand_total_rupiah").val(grandtotal*exchange_rate);
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
                field: 'unit_name',
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
                field: 'discount_amount',
                title: 'Disc PR',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'discount_percentage',
                title: 'Disc %',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.subtotal_before_discount',
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
                        '<button data-toggle="modal" data-target="#modal_check" type="button" href="#" class="m-badge m-badge--brand m-badge--wide check-stock" title="Edit" data-uuid=' +
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

        function item(item_uuid, triggeruuid) {
            $("#item_datatable").DataTable({
                dom: '<"top"f>rt<"bottom">pl',
                responsive: !0,
                searchDelay: 500,
                processing: !0,
                serverSide: !0,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 5,
                ajax: '/datatables/fefo-in/item/'+item_uuid+'/storage/'+ triggeruuid,
                columns: [
                    {
                        data: "code"
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "quantity"
                    },
                    {
                        data: "expired_at"
                    }
                ]
            });

            // $('<button type="button" class="btn m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air btn-primary btn-sm item_modal" style="margin-left: 60%; color: white;"><span><i class="la la-plus-circle"></i><span>Add</span></span></button>').appendTo('.item-body .dataTables_filter');

            $(".paging_simple_numbers").addClass("pull-left");
            $(".dataTables_length").addClass("pull-right");
            $(".dataTables_info").addClass("pull-left");
            $(".dataTables_info").addClass("margin-info");
            $(".paging_simple_numbers").addClass("padding-datatable");

            // $(".item-body").on("click", ".item_modal", function() {
            //     $("#add_modal_material").modal("show");
            // });
        }

        let item_atatables_init = true;
        let triggeruuid = "";
        let item_uuid = "";
        $("#item_storage_id").on('change', function() {
            item_uuid = $('#item_uuid').val();
            if (item_atatables_init == true) {
                item_atatables_init = false;
                triggeruuid = $(this).val();
                item(item_uuid, triggeruuid);
                $("#item_datatable")
                    .DataTable()
                    .ajax.reload();
            } else {
                let table = $("#item_datatable").DataTable();
                table.destroy();
                triggeruuid = $(this).val();
                item(item_uuid, triggeruuid);
                $("#item_datatable")
                    .DataTable()
                    .ajax.reload();
            }
        });

        $('.item_datatable').on('click', '.check-stock', function () {
            document.getElementById('item_uuid').value =  $(this).data('uuid');
        });

        $('.item_datatable').on('click', '.edit-item', function () {
            let item_uuid = $(this).data('uuid');
            $.ajax({
                url: '/label/get-purchase-orderes/'+po_uuid+'/item/'+ item_uuid ,
                type: 'GET',
                dataType: 'json',
                success: function (qty_item) {
                    document.getElementById('item_quantity_ordered').innerText = qty_item;
                }
            });
            $.ajax({
                url: '/purchase-order/'+po_uuid+'/item/'+ item_uuid +'/edit',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $.ajax({
                        url: '/get-item-unit-uuid/'+item_uuid,
                        // url: '/get-units',
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
                    // document.getElementById('discount').value = data.pivot.discount_value;
                    document.getElementById('remark_material').value = data.pivot.note;

                }
            });
        });

        $('.modal-footer').on('click', '.update-item', function () {
            let qty = $('#qty').val();
            let uuid = $('#uuid').val();
            let price = $('#price').val();
            let promo = $('#promo').val();
            let unit_id = $('#unit_id').val();
            // let tax_type = $('#taxation').val();
            let tax_amount = $('#tax_amount').val();
            let promo_type = $('#promo-type').val();
            let remark_material = $('#remark_material').val();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: "/purchase-order/"+po_uuid+"/item/"+uuid,
                type: "PUT",
                data: {
                    price:price,
                    promo:promo,
                    quantity:qty,
                    unit_id:unit_id,
                    // tax_type:tax_type,
                    note:remark_material,
                    promo_type:promo_type,
                    tax_amount:tax_amount,
                },
                success: function(response) {
                    if (response.errors) {
                        if (response.errors.quantity) {
                            $('#quantity-error').html(response.errors.quantity[0]);
                        }
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
                        let subtotal = discount = 0;
                        let dataSet = table.originalDataSet;
                        $.each(dataSet, function( index, data ) {
                            subtotal += parseInt(data.pivot.subtotal_after_discount);
                            discount += parseInt(data.discount);
                        });
                        $("#sub_total").html(subtotal);
                        $("#sub_total").val(subtotal);
                        $("#total_discount").html(discount);
                        $("#total_discount").val(discount);

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

            let tax_type = $('#taxation').val();
            let tax_amount = parseFloat($('#tax_amount').val());
            let subtotal = parseFloat($('#sub_total').val());
            let total_after_tax = parseFloat($('#grand_total').val());
            let total_discount = parseFloat($('#total_discount').val());
            let total_before_tax = subtotal - total_discount;

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
                    tax_type:tax_type,
                    tax_amount:tax_amount,
                    shipping_address:shipping_address,
                    top_day_amount:top_day_amount,
                    top_start_at:top_start_at,
                    subtotal:subtotal,
                    description:description,
                    total_after_tax:total_after_tax,
                    total_before_tax:total_before_tax,
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
    $("#taxation").select2();
    $("#taxation").on("change", function() {
        let tax_type = this.options[this.selectedIndex].text;
        if(tax_type !== "No Taxation"){
            $("#taxation").parent().siblings(".tax_amount").removeClass("hidden");
            $(".total_tax").removeClass("hidden");
            let tax_amount = calculate_tax();
            $("#total_ppn").val(ForeignFormatter.format(parseInt(tax_amount)));
            $("#total_ppn").html(ForeignFormatter.format(parseInt(tax_amount)));
        }else{
            $("#taxation").parent().siblings(".tax_amount").addClass("hidden");
            $(".total_tax").addClass("hidden");
        }
    });

    $("#tax_amount").on("change", function() {
        let tax_total = calculate_tax();
        $("#total_ppn").val(ForeignFormatter.format(parseInt(tax_total)));
        $("#total_ppn").html(ForeignFormatter.format(parseInt(tax_total)));
    });

    function calculate_tax(){
        let tax_type = $("#taxation option:selected").text();
        let tax_amount = parseFloat($("#tax_amount").val());
        let sub_total = parseFloat($("#sub_total").val());
        let total_discount = parseFloat($("#total_discount").val());
        let subtotal_after_discount = sub_total - total_discount;
        let tax_total = 0;
        let grand_total = subtotal_after_discount;
        if(tax_type == "Include"){
            tax_total = subtotal_after_discount / 1.1 * (tax_amount / 100) ;
        }else if(tax_type == "Exclude"){
            tax_total = subtotal_after_discount * (tax_amount / 100);
            grand_total -= tax_total;
        }

        $("#grand_total").html(ForeignFormatter.format(parseInt(grand_total)));
        $("#grand_total").val(parseInt(grand_total));

        return tax_total;
    }
});
