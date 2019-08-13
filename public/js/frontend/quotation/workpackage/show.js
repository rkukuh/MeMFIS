function strtrunc(str, max, add) {
    add = add || '...';
    return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};

let workpackage_datatables_init = true;
$(document).ready(function () {
    $.ajax({
        url: '/project/' + project_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (workpackage_datatables_init == true) {
                workpackage_datatables_init = false;
                workpackage(data.uuid);
            }
            else {
                let table = $('.workpackage_datatable').mDatatable();
                table.destroy();
                workpackage(data.uuid);
                table = $('.workpackage_datatable').mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        }
    });
});

$('.nav-tabs').on('click', '.workpackage', function () {
    let workpackage = $('.workpackage_datatable').mDatatable();

    workpackage.originalDataSet = [];
    workpackage.reload();
});

$('.nav-tabs').on('click', '.summary', function () {

    let summary = $('.summary_datatable').mDatatable();

    summary.originalDataSet = [];
    summary.reload();

});

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
            title: 'Work Package Number',
            sortable: !1,
        },
        {
            field: 'title',
            title: 'Title',
            sortable: 'asc',
            filterable: !1,
            template: function (t) {
                if(t.uuid){
                    return '<a href="/quotation/'+triggeruuid+'/workpackage/'+t.uuid+'">' + t.title + "</a>"
                }else{
                    return '<a href="#">' + t.title + "</a>"
                }
            }
        },
        {
            field: 'ac_type',
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
    ]
});
};
