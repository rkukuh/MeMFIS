let AdditionalTaskQtnShow = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        // $('.materials_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/workpackage/basic/',
        //                 map: function (raw) {
        //                     let dataSet = raw;

        //                     if (typeof raw.data !== 'undefined') {
        //                         dataSet = raw.data;
        //                     }

        //                     return dataSet;
        //                 }
        //             }
        //         },
        //         pageSize: 10,
        //         serverPaging: !0,
        //         serverFiltering: !0,
        //         serverSorting: !0
        //     },
        //     layout: {
        //         theme: 'default',
        //         class: '',
        //         scroll: false,
        //         footer: !1
        //     },
        //     sortable: !0,
        //     filterable: !1,
        //     pagination: !0,
        //     search: {
        //         input: $('#generalSearch')
        //     },
        //     toolbar: {
        //         items: {
        //             pagination: {
        //                 pageSizeSelect: [5, 10, 20, 30, 50, 100]
        //             }
        //         }
        //     },
        //     columns: [{
        //             field: 'number',
        //             title: 'Defect Card No',
        //             sortable: !1,
        //         },
        //         {
        //             field: 'title',
        //             title: 'P/N No.',
        //             sortable: 'asc',
        //             filterable: !1,template: function (t, e, i) {
        //                 if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
        //                     return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
        //                     return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if(t.type.code == "si"){
        //                     return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if(t.type.code == "preliminary"){
        //                     return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
        //                 } else {
        //                     return (
        //                         'dummy'
        //                     );
        //                 }
        //             }
        //         },
        //         {
        //             field: 'skill',
        //             title: 'Item Description',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'task.name',
        //             title: 'Qty',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Unit',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Unit Price',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Selling Unit Price',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Subtotal',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Marketing Notes',
        //             sortable: 'asc',
        //             filterable: !1,
        //         }
        //     ]
        // });
        // $('.tools_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/workpackage/basic/',
        //                 map: function (raw) {
        //                     let dataSet = raw;

        //                     if (typeof raw.data !== 'undefined') {
        //                         dataSet = raw.data;
        //                     }

        //                     return dataSet;
        //                 }
        //             }
        //         },
        //         pageSize: 10,
        //         serverPaging: !0,
        //         serverFiltering: !0,
        //         serverSorting: !0
        //     },
        //     layout: {
        //         theme: 'default',
        //         class: '',
        //         scroll: false,
        //         footer: !1
        //     },
        //     sortable: !0,
        //     filterable: !1,
        //     pagination: !0,
        //     search: {
        //         input: $('#generalSearch')
        //     },
        //     toolbar: {
        //         items: {
        //             pagination: {
        //                 pageSizeSelect: [5, 10, 20, 30, 50, 100]
        //             }
        //         }
        //     },
        //     columns: [{
        //             field: 'number',
        //             title: 'Defect Card No',
        //             sortable: !1,
        //         },
        //         {
        //             field: 'title',
        //             title: 'P/N No.',
        //             sortable: 'asc',
        //             filterable: !1,template: function (t, e, i) {
        //                 if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
        //                     return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
        //                     return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if(t.type.code == "si"){
        //                     return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
        //                 }
        //                 else if(t.type.code == "preliminary"){
        //                     return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
        //                 } else {
        //                     return (
        //                         'dummy'
        //                     );
        //                 }
        //             }
        //         },
        //         {
        //             field: 'skill',
        //             title: 'Item Description',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'task.name',
        //             title: 'Qty',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Unit',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Unit Price',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Charge Price',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Subtotal',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'estimation_manhour',
        //             title: 'Marketing Notes',
        //             sortable: 'asc',
        //             filterable: !1,
        //         }
        //     ]
        // });
        $('.defect_card_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid+'/selected',

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
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.taskcard.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'defectcard_skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    AdditionalTaskQtnShow.init();
});
