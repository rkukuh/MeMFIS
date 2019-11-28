let PurchaseRequestGeneralShow = {
    init: function () {
        $(".item_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/purchase-request/item/" +
                            pr_uuid +
                            "/general/material",

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
            ]
        });

        $(".tool_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/purchase-request/item/" +
                            pr_uuid +
                            "/general/tool",

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
            ]
        });
    }
};

jQuery(document).ready(function () {
    PurchaseRequestGeneralShow.init();
});
