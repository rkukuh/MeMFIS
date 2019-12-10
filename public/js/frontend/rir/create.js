let receiving_inspection_report = {
    init: function() {
        function item(uuid) {
            $(".rir_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            method: "GET",
                            url: "/datatables/purchase-order/item/" + uuid,
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
                    serverFiltering: !1,
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
                        field: "item.code",
                        title: "P/N",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "item.name",
                        title: "Item Description",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "",
                        title: "Qty PR",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "quantity",
                        title: "Qty PO",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "",
                        title: "Qty",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "",
                        title: "Unit",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "",
                        title: "Remark",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "",
                        title: "Expired Date",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    }
                ]
            });
        }

        let item_datatables_init = true;
        $('select[name="purchase_order"]').on("change", function() {
            let uuid = $("#purchase_order").val();
            if (item_datatables_init == true) {
                item_datatables_init = false;
                item(uuid);
                table = $(".rir_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            } else {
                let table = $(".rir_datatable").mDatatable();
                table.destroy();
                item(uuid);
                table = $(".rir_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        });

        $('.action-buttons').on('click', '.add-rir', function () {
            $('#name-error').html('');
            $('#simpan').text('Simpan');

            let purchase_order = $('#purchase_order').val();
            let vendor = $('#vendor').val();
            let document = $('input[name=document]').val();
            let date = $('#date').val();
            let status = $('input[name="status"]:checked').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/rir',
                data: {
                    _token: $('input[name=_token]').val(),
                    purchase_order: purchase_order,
                    rir_date: date,
                    vendor: vendor,
                    delivery_document_number: document,
                    status:status,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.aircraft_id) {
                        //     $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        // }
                        // if (data.errors.title) {
                        //     $('#title-error').html(data.errors.title[0]);
                        // }

                        // document.getElementById('applicability-airplane').value = applicability-airplane;
                        // document.getElementById('title').value = title;

                    } else {

                        toastr.success('RIR has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/rir/'+data.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    receiving_inspection_report.init();
});
