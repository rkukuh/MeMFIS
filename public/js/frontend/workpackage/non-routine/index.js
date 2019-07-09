let NonRoutineWorkpackage = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.ad-sb_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ad-sb/',
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
                            '<button data-toggle="modal" data-target="#modal_material_eo" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
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
                            '<button data-toggle="modal" data-target="#modal_tool_eo" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
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
                                t.pivot.sequence+'<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }else{
                            return (
                                '<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
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
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal "  data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal"  data-tc_uuid="' + t.uuid + '" data-toggle="modal" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
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
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.pivot.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }

                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
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
                        url: '/datatables/workpackage/'+workPackage_uuid+'/cmr-awl/',
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
                            '<button data-toggle="modal" data-target="#modal_material_eo" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
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
                            '<button data-toggle="modal" data-target="#modal_tool_eo" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
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
                                t.pivot.sequence+'<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }else{
                            return (
                                '<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
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
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill  predecessor-modal" data-toggle="modal"  data-tc_uuid="' + t.uuid + '" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal" data-toggle="modal"  data-tc_uuid="' + t.uuid + '" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
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
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.pivot.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }

                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
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
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/',
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
                                t.pivot.sequence+'<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }else{
                            return (
                                '<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.pivot.sequence+' data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
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
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill  predecessor-modal" data-toggle="modal"  data-tc_uuid="' + t.uuid + '" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal" data-toggle="modal"  data-tc_uuid="' + t.uuid + '" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
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
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.pivot.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.uuid+' data-mandatory=0' +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }

                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function () {
    NonRoutineWorkpackage.init();
});
