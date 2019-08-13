
let LeavePeriod = {
    init: function () {
        $('.leave_period_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer',
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
            columns: [{
                    field: 'name',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/customer/'+t.uuid+'">' + t.name + "</a>"
                    }
                },
                {
                    field: 'addresses',
                    title: 'Leave Period Name',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.addresses[0]){
                            return t.addresses[0].address
                        }else{
                            return ""
                        }
                    }
                },
                {
                    field: 'phones',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.phones[0]){
                            return t.phones[0].number
                        }else{
                            return ""
                        }
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    LeavePeriod.init();
});
