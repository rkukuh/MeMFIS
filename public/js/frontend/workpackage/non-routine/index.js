let NonRoutineWorkpackage = {
    init: function() {
        function strtrunc(str, max, add) {
            add = add || "...";
            return typeof str === "string" && str.length > max
                ? str.substring(0, max) + add
                : str;
        }

        $('.preliminary_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url:
                         '/datatables/workpackage/'+workPackage_uuid+'/preliminary/',
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
                serverFiltering: !1,
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
                    field: 'taskcard.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,template: function (t, e, i) {
                        if((t.taskcard.type.code == "basic") || (t.taskcard.type.code == "sip") || (t.taskcard.type.code == "cpcp")){
                            return '<a href="/taskcard-routine/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if ((t.taskcard.type.code == "ad") || (t.taskcard.type.code == "sb") || (t.taskcard.type.code == "eo") || (t.taskcard.type.code == "ea") || (t.taskcard.type.code == "htcrr") || (t.taskcard.type.code == "cmr") || (t.taskcard.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if(t.taskcard.type.code == "si"){
                            return '<a href="/taskcard-si/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if(t.taskcard.type.code == "preliminary"){
                            return '<a href="/preliminary/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        } else {
                            return (
                                'dummy'
                            );
                        }
                    }
                },
                {
                    field: 'task',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.taskcard.description) {
                            data = strtrunc(t.taskcard.description, 50);
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
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.taskcard.uuid +
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
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.taskcard.uuid +
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
                        if(t.sequence){
                            return (
                                t.sequence+'<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.sequence+' data-uuid=' +
                                t.taskcard.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }else{
                            return (
                                '<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.sequence+' data-uuid=' +
                                t.taskcard.uuid +
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
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal predecessor" data-toggle="modal"  data-tc_uuid="' + t.taskcard.uuid + '" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal successor" data-toggle="modal"  data-tc_uuid="' + t.taskcard.uuid + '" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'mandatory',
                    title: 'Mandatory',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            if(t.is_mandatory == 1){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.taskcard.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.taskcard.uuid+' data-mandatory=0' +
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
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.taskcard.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                }
            ]
        });
     
        $(".ad-sb_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/workpackage/" +
                            workPackage_uuid +
                            "/ad-sb/",
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
                serverFiltering: !1,
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
                    field: "eo_instruction.eo_header.number",
                    title: "Taskcard Number",
                    sortable: !1
                },
                {
                    field: "eo_instruction.eo_header.title",
                    title: "Title",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (
                            t.eo_instruction.eo_header.type.code == "basic" ||
                            t.eo_instruction.eo_header.type.code == "sip" ||
                            t.eo_instruction.eo_header.type.code == "cpcp"
                        ) {
                            return (
                                '<a href="/taskcard-routine/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (
                            t.eo_instruction.eo_header.type.code == "ad" ||
                            t.eo_instruction.eo_header.type.code == "sb" ||
                            t.eo_instruction.eo_header.type.code == "eo" ||
                            t.eo_instruction.eo_header.type.code == "ea" ||
                            t.eo_instruction.eo_header.type.code == "htcrr" ||
                            t.eo_instruction.eo_header.type.code == "cmr" ||
                            t.eo_instruction.eo_header.type.code == "awl"
                        ) {
                            return (
                                '<a href="/taskcard-eo/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "si") {
                            return (
                                '<a href="/taskcard-si/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "preliminary") {
                            return (
                                '<a href="/preliminary/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else {
                            return "dummy";
                        }
                    }
                },
                {
                    field: "skill",
                    title: "Skill",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "task",
                    title: "Task",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.estimation_manhour",
                    title: "Manhour",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.description",
                    title: "Description",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        if (t.eo_instruction.description) {
                            data = strtrunc(t.eo_instruction.description, 50);
                            return "<p>" + data + "</p>";
                        }

                        return "";
                    }
                },
                {
                    field: "material",
                    title: "Material",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "tool",
                    title: "Tool",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "sequence",
                    title: "Sequence",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.sequence) {
                            return (
                                t.sequence +
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        } else {
                            return (
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "predecessor",
                    title: "Predecessor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal-instruction predecessor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_predecessor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "successor",
                    title: "Successor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal-instruction successor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_successor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "mandatory",
                    title: "Mandatory",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.is_mandatory == 1) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=1" +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        } else if (t.is_mandatory == 0) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=0" +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-instruction" title="Delete" data-uuid="' +
                            t.eo_instruction.uuid +
                            '">' +
                            '<i class="la la-trash"></i>' +
                            "</a>"
                        );
                    }
                }
            ]
        });

        $(".cmr-awl_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/workpackage/" +
                            workPackage_uuid +
                            "/cmr-awl/",
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
                serverFiltering: !1,
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
                    field: "eo_instruction.eo_header.number",
                    title: "Taskcard Number",
                    sortable: !1
                },
                {
                    field: "eo_instruction.eo_header.title",
                    title: "Title",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (
                            t.eo_instruction.eo_header.type.code == "basic" ||
                            t.eo_instruction.eo_header.type.code == "sip" ||
                            t.eo_instruction.eo_header.type.code == "cpcp"
                        ) {
                            return (
                                '<a href="/taskcard-routine/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (
                            t.eo_instruction.eo_header.type.code == "ad" ||
                            t.eo_instruction.eo_header.type.code == "sb" ||
                            t.eo_instruction.eo_header.type.code == "eo" ||
                            t.eo_instruction.eo_header.type.code == "ea" ||
                            t.eo_instruction.eo_header.type.code == "htcrr" ||
                            t.eo_instruction.eo_header.type.code == "cmr" ||
                            t.eo_instruction.eo_header.type.code == "awl"
                        ) {
                            return (
                                '<a href="/taskcard-eo/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "si") {
                            return (
                                '<a href="/taskcard-si/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "preliminary") {
                            return (
                                '<a href="/preliminary/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else {
                            return "dummy";
                        }
                    }
                },
                {
                    field: "skill",
                    title: "Skill",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "task",
                    title: "Task",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.estimation_manhour",
                    title: "Manhour",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.description",
                    title: "Description",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        if (t.eo_instruction.description) {
                            data = strtrunc(t.eo_instruction.description, 50);
                            return "<p>" + data + "</p>";
                        }

                        return "";
                    }
                },
                {
                    field: "material",
                    title: "Material",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "tool",
                    title: "Tool",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "sequence",
                    title: "Sequence",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.sequence) {
                            return (
                                t.sequence +
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        } else {
                            return (
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "predecessor",
                    title: "Predecessor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal-instruction predecessor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_predecessor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "successor",
                    title: "Successor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal-instruction successor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_successor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "mandatory",
                    title: "Mandatory",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.is_mandatory == 1) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=1" +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        } else if (t.is_mandatory == 0) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=0" +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-instruction" title="Delete" data-uuid="' +
                            t.eo_instruction.uuid +
                            '">' +
                            '<i class="la la-trash"></i>' +
                            "</a>"
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
                serverFiltering: !1,
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
                    field: 'taskcard.number',
                    title: 'Taskcard Number',
                    sortable: !1,
                },
                {
                    field: 'taskcard.title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,template: function (t, e, i) {
                        if((t.taskcard.type.code == "basic") || (t.taskcard.type.code == "sip") || (t.taskcard.type.code == "cpcp")){
                            return '<a href="/taskcard-routine/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if ((t.taskcard.type.code == "ad") || (t.taskcard.type.code == "sb") || (t.taskcard.type.code == "eo") || (t.taskcard.type.code == "ea") || (t.taskcard.type.code == "htcrr") || (t.taskcard.type.code == "cmr") || (t.taskcard.type.code == "awl")){
                            return '<a href="/taskcard-eo/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if(t.taskcard.type.code == "si"){
                            return '<a href="/taskcard-si/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
                        }
                        else if(t.taskcard.type.code == "preliminary"){
                            return '<a href="/preliminary/'+t.taskcard.uuid+'">' + t.taskcard.title + "</a>"
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
                    field: 'task',
                    title: 'Task',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.taskcard.description) {
                            data = strtrunc(t.taskcard.description, 50);
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
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.taskcard.uuid +
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
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.taskcard.uuid +
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
                        if(t.sequence){
                            return (
                                t.sequence+'<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.sequence+' data-uuid=' +
                                t.taskcard.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }else{
                            return (
                                '<button data-toggle="modal" data-target="#taskcard_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence='+t.sequence+' data-uuid=' +
                                t.taskcard.uuid +
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
                        return '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal predecessor" data-toggle="modal"  data-tc_uuid="' + t.taskcard.uuid + '" data-target="#modal_predecessor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'successor',
                    title: 'Successor',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal successor" data-toggle="modal"  data-tc_uuid="' + t.taskcard.uuid + '" data-target="#modal_successor"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                    }
                },
                {
                    field: 'mandatory',
                    title: 'Mandatory',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            if(t.is_mandatory == 1){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.taskcard.uuid+' data-mandatory=1' +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                                );
                            }
                            else if(t.is_mandatory == 0){
                                return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid='+t.taskcard.uuid+' data-mandatory=0' +
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
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.taskcard.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'
                            );
                        }
                }
            ]
        });
      
        $(".ea_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/workpackage/" +
                            workPackage_uuid +
                            "/ea/",
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
                serverFiltering: !1,
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
                    field: "eo_instruction.eo_header.number",
                    title: "Taskcard Number",
                    sortable: !1
                },
                {
                    field: "eo_instruction.eo_header.title",
                    title: "Title",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (
                            t.eo_instruction.eo_header.type.code == "basic" ||
                            t.eo_instruction.eo_header.type.code == "sip" ||
                            t.eo_instruction.eo_header.type.code == "cpcp"
                        ) {
                            return (
                                '<a href="/taskcard-routine/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (
                            t.eo_instruction.eo_header.type.code == "ad" ||
                            t.eo_instruction.eo_header.type.code == "sb" ||
                            t.eo_instruction.eo_header.type.code == "eo" ||
                            t.eo_instruction.eo_header.type.code == "ea" ||
                            t.eo_instruction.eo_header.type.code == "htcrr" ||
                            t.eo_instruction.eo_header.type.code == "cmr" ||
                            t.eo_instruction.eo_header.type.code == "awl"
                        ) {
                            return (
                                '<a href="/taskcard-eo/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "si") {
                            return (
                                '<a href="/taskcard-si/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "preliminary") {
                            return (
                                '<a href="/preliminary/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else {
                            return "dummy";
                        }
                    }
                },
                {
                    field: "skill",
                    title: "Skill",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "task",
                    title: "Task",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.estimation_manhour",
                    title: "Manhour",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.description",
                    title: "Description",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        if (t.eo_instruction.description) {
                            data = strtrunc(t.eo_instruction.description, 50);
                            return "<p>" + data + "</p>";
                        }

                        return "";
                    }
                },
                {
                    field: "material",
                    title: "Material",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "tool",
                    title: "Tool",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "sequence",
                    title: "Sequence",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.sequence) {
                            return (
                                t.sequence +
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        } else {
                            return (
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "predecessor",
                    title: "Predecessor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal-instruction predecessor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_predecessor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "successor",
                    title: "Successor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal-instruction successor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_successor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "mandatory",
                    title: "Mandatory",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.is_mandatory == 1) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=1" +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        } else if (t.is_mandatory == 0) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=0" +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-instruction" title="Delete" data-uuid="' +
                            t.eo_instruction.uuid +
                            '">' +
                            '<i class="la la-trash"></i>' +
                            "</a>"
                        );
                    }
                }
            ]
        });

        $(".eo_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url:
                            "/datatables/workpackage/" +
                            workPackage_uuid +
                            "/eo/",
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
                serverFiltering: !1,
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
                    field: "eo_instruction.eo_header.number",
                    title: "Taskcard Number",
                    sortable: !1
                },
                {
                    field: "eo_instruction.eo_header.title",
                    title: "Title",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (
                            t.eo_instruction.eo_header.type.code == "basic" ||
                            t.eo_instruction.eo_header.type.code == "sip" ||
                            t.eo_instruction.eo_header.type.code == "cpcp"
                        ) {
                            return (
                                '<a href="/taskcard-routine/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (
                            t.eo_instruction.eo_header.type.code == "ad" ||
                            t.eo_instruction.eo_header.type.code == "sb" ||
                            t.eo_instruction.eo_header.type.code == "eo" ||
                            t.eo_instruction.eo_header.type.code == "ea" ||
                            t.eo_instruction.eo_header.type.code == "htcrr" ||
                            t.eo_instruction.eo_header.type.code == "cmr" ||
                            t.eo_instruction.eo_header.type.code == "awl"
                        ) {
                            return (
                                '<a href="/taskcard-eo/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "si") {
                            return (
                                '<a href="/taskcard-si/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else if (t.eo_instruction.eo_header.type.code == "preliminary") {
                            return (
                                '<a href="/preliminary/' +
                                t.eo_instruction.eo_header.uuid +
                                '">' +
                                t.eo_instruction.eo_header.title +
                                "</a>"
                            );
                        } else {
                            return "dummy";
                        }
                    }
                },
                {
                    field: "skill",
                    title: "Skill",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "task",
                    title: "Task",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.estimation_manhour",
                    title: "Manhour",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "eo_instruction.description",
                    title: "Description",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        if (t.eo_instruction.description) {
                            data = strtrunc(t.eo_instruction.description, 50);
                            return "<p>" + data + "</p>";
                        }

                        return "";
                    }
                },
                {
                    field: "material",
                    title: "Material",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "tool",
                    title: "Tool",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool_taskcard_wp" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.eo_instruction.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: "sequence",
                    title: "Sequence",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.sequence) {
                            return (
                                t.sequence +
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        } else {
                            return (
                                '<button data-toggle="modal" data-target="#instruction_sequence" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill sequence" title="Sequence" data-sequence=' +
                                t.sequence +
                                " data-uuid=" +
                                t.eo_instruction.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-file-text-o"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "predecessor",
                    title: "Predecessor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="predecessor" name="predecessor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill predecessor-modal-instruction predecessor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_predecessor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "successor",
                    title: "Successor",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<button type="button" id="successor" name="successor" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill successor-modal-instruction successor-instruction"  data-tc_uuid="' +
                            t.eo_instruction.uuid +
                            '" data-toggle="modal" data-target="#modal_successor_instruction"><i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>'
                        );
                    }
                },
                {
                    field: "mandatory",
                    title: "Mandatory",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t, e, i) {
                        if (t.is_mandatory == 1) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=1" +
                                ' title="Mandatory"><i class="la la-check-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        } else if (t.is_mandatory == 0) {
                            return (
                                '<button type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill mandatory" title="Mandatory" data-uuid=' +
                                t.eo_instruction.uuid +
                                " data-mandatory=0" +
                                ' title="Not Mandatory"><i class="la la-circle-o"></i></a>\t\t\t\t\t\t\t'
                            );
                        }
                    }
                },
                {
                    field: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-instruction" title="Delete" data-uuid="' +
                            t.eo_instruction.uuid +
                            '">' +
                            '<i class="la la-trash"></i>' +
                            "</a>"
                        );
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function() {
    NonRoutineWorkpackage.init();
});
