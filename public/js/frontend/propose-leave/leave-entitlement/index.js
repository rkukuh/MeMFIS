let LeaveEntitlement = {
    init: function () {
        $('.leave_entitlement_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/price-list-item',
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
                serverPaging: !1,
                serverSorting: !1
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
            columns: [
                {
                    field: '',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" data-toggle="modal" data-target="#modal_remaining_leave" class="btn btn-primary btn-sm m-btn--hover-brand select-account_code" title="Remaining">' +
                                '\n<span>REMAINING LEAVE</span>'+
                            '</a>'
                        );
                    }
                }
            ]
        });     

    }
};
                                                                                                                                                                              





jQuery(document).ready(function () {
    LeaveEntitlement.init();
});
