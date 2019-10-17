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
                        field: "code",
                        title: "P/N",
                        sortable: "asc",
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: "name",
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
                        field: "pivot.quantity",
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

        let simpan = $('.action-buttons').on('click', '.add-rir', function () {
            // var x=$("#checkbox").is(":checked");

            // var checkedValue = $('.general_document:checked').val();
            // console.log($('.general_document').val());
            // alert($('.check_class').val());
            $('#name-error').html('');
            $('#simpan').text('Simpan');

            let general_document = [];
            $.each($("input[name='general_document[]']:checked"), function() {
                general_document.push($(this).val());
            });

            console.log(general_document);

            let technical_document = [];
            $.each($("input[name='technical_document[]']:checked"), function() {
                technical_document.push($(this).val());
            });
            console.log(technical_document);


            let purchase_order = $('#purchase_order').val();
            let vendor = $('#vendor').val();

            let document = $('input[name=document]').val();
            let date = $('#date').val();
            let status = $('input[name="status"]:checked').val();
            let type = $('input[name="type"]:checked').val();
            let condition = $('input[name="condition"]:checked').val();
            let preservation_check = $('input[name="preservation_check"]:checked').val();
            let condition_material = $('input[name="condition_material"]:checked').val();
            let quality = $('input[name="quality"]:checked').val();
            let identification = $('input[name="identification"]:checked').val();
            let packing_handling_check = $('#packing_handling_check').val();
            let preservation_check_explain = $('#preservation_check_explain').val();
            let document_check = $('#document_check').val();
            let material_check = $('#material_check').val();
            let decision = $('#decision').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/workpackage',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: title,
                    aircraft_id: applicability_airplane,
                    description: description,
                    is_template:'1',
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.aircraft_id) {
                            $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                        }
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        // document.getElementById('applicability-airplane').value = applicability-airplane;
                        // document.getElementById('title').value = title;

                    } else {
                        // $('#modal_customer').modal('hide');

                        toastr.success('Work Package has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/workpackage/'+data.uuid+'/edit';
                        // let table = $('.m_datatable').mDatatable();

                        // table.originalDataSet = [];
                        // table.reload();
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    receiving_inspection_report.init();
});
