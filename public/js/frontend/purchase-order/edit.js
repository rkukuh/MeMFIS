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
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_check" type="button" href="#" class="m-badge m-badge--brand m-badge--wide " title="Edit" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\tCheck\t\t\t\t\t\t</button>\t\t\t\t\t\t'+

                        '<button data-toggle="modal" data-target="#modal_po" type="button" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                            '<i class="la la-pencil"></i>' +
                        '</button>' 
                    );
                }
            }
            ]
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


    }
};

jQuery(document).ready(function () {
    PurchaseOrder.init();
});
