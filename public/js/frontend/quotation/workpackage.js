function strtrunc(str, max, add) {
    add = add || '...';
    return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};

function workpackage(triggeruuid) {

$('.workpackage_datatable').mDatatable({
    data: {
        type: 'remote',
        source: {
            read: {
                method: 'GET',
                url: '/datatables/project/'+triggeruuid+'/workpackage/',
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
        serverFiltering: !0,
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
    columns: [
        {
            field: 'code',
            title: 'Workpackage Number',
            sortable: !1,
        },
        {
            field: 'title',
            title: 'Title',
            sortable: 'asc',
            filterable: !1,
        },
        {
            field: 'aircraft.name',
            title: 'A/C Type',
            sortable: 'asc',
            filterable: !1,
        },
        {
            field: 'description',
            title: 'Description',
            sortable: 'asc',
            filterable: !1,
            template: function (t) {
                if (t.description) {
                    data = strtrunc(t.description, 50);
                    return (
                        '<p>' + data + '</p>'
                    );
                }

                return ''
            }
        },
        {
            field: 'Actions',
            sortable: !1,
            overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<a href="/quotation/' + triggeruuid + '/workpackage/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                            '<i class="la la-pencil"></i>' +
                        '</a>' +
                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-workpackage" title="Delete" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                        '</a>'
                    );
                }
        }
    ]
});
};
