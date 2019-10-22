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

                            let subtotal = discount = 0;
                            $.each(dataSet, function( index, data ) {
                                subtotal += parseInt(data.pivot.subtotal_after_discount);
                                discount += parseInt(data.discount);
                            });
                            $("#sub_total").html(subtotal);
                            $("#sub_total").val(subtotal);
                            $("#total_discount").html(discount);
                            $("#total_discount").val(discount);

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
                field: 'discount',
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
                        '<button data-toggle="modal" data-target="#modal_check" type="button" href="#" class="m-badge m-badge--brand m-badge--wide check-stock" title="Edit" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\tCheck\t\t\t\t\t\t</button>\t\t\t\t\t\t'
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

        $('.item_datatable').on('click', '.check-stock', function () {
            document.getElementById('item_uuid').value =  $(this).data('uuid');
        });


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



    }
};

jQuery(document).ready(function () {
    PurchaseOrder.init();
});
