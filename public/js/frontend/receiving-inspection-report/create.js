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

        let remove = $(".rir_datatable").on("click", ".delete", function() {
            let triggerid = $(this).data("id");

            swal({
                title: "Are you sure?",
                type: "question",
                confirmButtonText: "Yes, REMOVE",
                confirmButtonColor: "#d33",
                cancelButtonText: "Cancel",
                showCancelButton: true
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url: "/customer/" + triggerid + "",
                        success: function(data) {
                            toastr.success(
                                "Material has been deleted.",
                                "Deleted",
                                {
                                    timeOut: 5000
                                }
                            );
                            let table = $(".customer_datatable").mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function(jqXhr, json, errorThrown) {
                            let errorsHtml = "";
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function(index, value) {
                                $("#delete-error").html(value);
                            });
                        }
                    });
                }
            });
        });
    }
};

jQuery(document).ready(function() {
    receiving_inspection_report.init();
});
