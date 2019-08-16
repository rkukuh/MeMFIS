function strtrunc(str, max, add) {
    add = add || '...';
    return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};

let NonRoutineWorkpackage = {
    init: function () {
        $('.ad-sb_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/'+Project_uuid+'/workpackage/'+workPackage_uuid+'/ad-sb',
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
            columns: [{
                field: 'number',
                title: 'Taskcard Number',
                sortable: !1,
            },
            {
                field: 'title',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                        return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                        return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if(t.type.code == "si"){
                        return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if(t.type.code == "preliminary"){
                        return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
                    } else {
                        return (
                            'dummy'
                        );
                    }
                }
            },
            {
                field: 'skill',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'task.name',
                title: 'Task',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'estimation_manhour',
                title: 'Manhour',
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
                field: 'sequence',
                title: 'Sequence',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                        if(t.pivot.sequence){
                            return (
                                t.pivot.sequence
                            );
                        }else{
                            return (
                                '-'
                            );
                        }
                    }
            },
            {
                field: 'predecessor',
                title: 'Predecessor',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill " data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                }
            },
            {
                field: 'successor',
                title: 'Successor',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                }
            },
            {
                field: 'mandatory',
                title: 'Mandatory',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                        if(t.pivot.is_mandatory == 1){
                            return (
                            '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                            ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                        else if(t.pivot.is_mandatory == 0){
                            return (
                            '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                            ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }

                }
            }  
            ]
        });

        $('.cmr-awl_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/'+Project_uuid+'/workpackage/'+workPackage_uuid+'/cmr-awl',
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
            columns: [{
                    field: 'number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                            return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "si"){
                            return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
                        }
                        else if(t.type.code == "preliminary"){
                            return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
                        } else {
                            return (
                                'dummy'
                            );
                        }
                    }
                },
                {
                    field: 'skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'task.name',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
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
                    field: 'sequence',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.pivot.sequence){
                            return (
                                t.pivot.sequence
                            );
                        }else{
                            return (
                                '-'
                            );
                        }
                    }
                },
                {
                    field: 'predecessor',
                    title: 'Predecessor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill " data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'mandatory',
                    title: 'Mandatory',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            if(t.pivot.is_mandatory == 1){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.pivot.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }

                    }
                }
            ]
        });

        $('.si_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/'+Project_uuid+'/workpackage/'+workPackage_uuid+'/si',
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
            columns: [{
                field: 'number',
                title: 'Taskcard Number',
                sortable: !1,
            },
            {
                field: 'title',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                        return '<a href="/taskcard-routine/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                        return '<a href="/taskcard-eo/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if(t.type.code == "si"){
                        return '<a href="/taskcard-si/'+t.uuid+'">' + t.title + "</a>"
                    }
                    else if(t.type.code == "preliminary"){
                        return '<a href="/preliminary/'+t.uuid+'">' + t.title + "</a>"
                    } else {
                        return (
                            'dummy'
                        );
                    }
                }
            },
            {
                field: 'skill',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'task.name',
                title: 'Task',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'estimation_manhour',
                title: 'Manhour',
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
                field: 'material',
                title: 'Material',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_material_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                    );
                }

            },
            {
                field: 'tool',
                title: 'Tool',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_tool_routine-si" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            },
            {
                field: 'sequence',
                title: 'Sequence',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                        if(t.pivot.sequence){
                            return (
                                t.pivot.sequence
                            );
                        }else{
                            return (
                                '-'
                            );
                        }
                    }
            },
            {
                field: 'predecessor',
                title: 'Predecessor',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill " data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                }
            },
            {
                field: 'successor',
                title: 'Successor',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                }
            },
            {
                field: 'mandatory',
                title: 'Mandatory',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                        if(t.pivot.is_mandatory == 1){
                            return (
                            '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                            ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                        else if(t.pivot.is_mandatory == 0){
                            return (
                            '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                            ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }

                }
            }
            ]
        });

        $('.workshop_task_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage',
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
            columns: [{
                    field: 'id',
                    title: 'Workshop Task No',
                    sortable: !1,
                },
                {
                    field: 'quotation',
                    title: 'Job request',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer',
                    title: 'Workshop Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'status',
                    title: 'Manhours',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'statu',
                    title: 'Qty Helper',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'stat',
                    title: 'RII ?',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    NonRoutineWorkpackage.init();
});

$('#m_accordion_2_item_1_head').on('click', function () {
    let table = $('.ad-sb_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_2_head').on('click', function () {
    let table = $('.cmr-awl_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_3_head').on('click', function () {
    let table = $('.si_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

$('#m_accordion_2_item_4_head').on('click', function () {
    let table = $('.ht_crr_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

