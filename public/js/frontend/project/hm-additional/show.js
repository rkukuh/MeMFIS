let AdditionalTaskShow = {
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
        //             field: 'description',
        //             title: 'Remark',
        //             sortable: 'asc',
        //             filterable: !1,
        //             template: function (t) {
        //                 if (t.description) {
        //                     data = strtrunc(t.description, 50);
        //                     return (
        //                         '<p>' + data + '</p>'
        //                     );
        //                 }

        //                 return ''
        //             }
        //         }
        //     ]
        // });
        // $('.tools_datatable').mDatatable({
        //     data: {
        //         type: 'remote',
        //         source: {
        //             read: {
        //                 method: 'GET',
        //                 url: '/datatables/workpackage/sip/',
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
        //             title: 'Defect Card No.',
        //             sortable: !1,
        //         },
        //         {
        //             field: 'title',
        //             title: 'P/N No.',
        //             sortable: 'asc',
        //             filterable: !1,
        //             template: function (t, e, i) {
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
        //             title: 'Manhour',
        //             sortable: 'asc',
        //             filterable: !1,
        //         },
        //         {
        //             field: 'description',
        //             title: 'Unit',
        //             sortable: 'asc',
        //             filterable: !1,
        //             template: function (t) {
        //                 if (t.description) {
        //                     data = strtrunc(t.description, 50);
        //                     return (
        //                         '<p>' + data + '</p>'
        //                     );
        //                 }

        //                 return ''
        //             }
        //         },
        //         {
        //             field: 'material',
        //             title: 'Remark',
        //             sortable: 'asc',
        //             filterable: !1,
        //             template: function (t, e, i) {
        //                 return (
        //                     '<button data-toggle="modal" data-target="#modal_material_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
        //                     t.uuid +
        //                     '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
        //                 );
        //             }

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
                    field: 'jobcard.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                    // template: function (t) {
                    //     if (t.taskcard.description) {
                    //         data = strtrunc(t.taskcard.description, 50);
                    //         return (
                    //             '<p>' + data + '</p>'
                    //         );
                    //     }

                    //     return ''
                    // }
                },
                {
                    field: 'jobcard.number',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    AdditionalTaskShow.init();
});
