let DefectCard = {
    init: function () {

        $(".tools_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/tools',


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
                serverPaging: !1,
                serverSorting: !1
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
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.note",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                }
            ]
        });
        $(".materials_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: '/datatables/discrepancy/'+uuid+'/materials',

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
                serverPaging: !1,
                serverSorting: !1
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
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_off",
                    title: "SN Off",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.sn_on",
                    title: "SN On",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "pivot.quantity",
                    title: "Quantity",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.ipc_ref",
                    title: "IPC Ref",
                    sortable: "asc",
                    filterable: !1,
                },
                {
                    field: "pivot.note",
                    title: "Remark",
                    sortable: "asc",
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
  DefectCard.init();
});
