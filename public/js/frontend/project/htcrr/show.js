

let Workpackage = {
    init: function () {
        $('.ht_crr_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/' + project_uuid + '/htcrr/',
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
                field: 'code',
                title: 'CRI No',
                sortable: !1,
            },
            {
                field: 'item.code',
                title: 'P/N',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'item.name',
                title: 'Item Description',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'position',
                title: 'Position',
                sortable: 'asc',
                filterable: !1,
            },
             {
                field: 'skill_name',
                title: 'Skill',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'is_rii',
                title: 'RII',
                sortable: 'asc',
                filterable: !1,
                template: function (t){
                    let e = {
                        1:{
                            title:  "Yes",
                            class:  "m-badge--brand"
                        },
                        0:{
                            title: "No",
                            class: " m-badge--warning"
                        }
                    };
                        return '<span class="m-badge ' + e[t.is_rii].class + ' m-badge--wide">' + e[t.is_rii].title + "</span>"
                    
                }
            },
            {
                field: 'removal',
                title: 'Est. Removal Mhrs ',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'installation',
                title: 'Est. Installation Mhrs ',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'description',
                title: 'Description',
                sortable: 'asc',
                filterable: !1,
            },
           
            {
                field: 'material',
                title: 'Material',
                sortable: 'asc',
                filterable: !1,
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_material_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material_htcrr" title="Material" data-uuid=' +
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
                        '<button data-toggle="modal" data-target="#modal_tool_htcrr" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool_htcrr" title="Tool" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                    );
                }
            },{
                field: '#',
                title: 'Create Task (Sent to)',
                sortable: !1,
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<button data-toggle="modal" data-target="#modal_workshop_task" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Create Workshop Task" data-uuid=' +
                        t.uuid +
                        '>\t\t\t\t\t\t\t<i class="la la-file"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'                      
                                        );
                }
            }
            ]
        });

        let material_htcrr_datatables_init = true;
        let triggeruuid = "";
        let htcrr_materials = $('.ht_crr_datatable').on('click', '.material_htcrr', function () {
            if (material_htcrr_datatables_init == true) {
                material_htcrr_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                htcrr_material(triggeruuid);
                $('#m_datatable_material_htcrr').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_material_htcrr').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                htcrr_material(triggeruuid);
                $('#m_datatable_material_htcrr').DataTable().ajax.reload();
            }
        });

        let tool_htcrr_datatables_init = true;
        let htcrr_tools = $('.ht_crr_datatable').on('click', '.tool_htcrr', function () {
            if (tool_htcrr_datatables_init == true) {
                tool_htcrr_datatables_init = false;
                triggeruuid = $(this).data('uuid');
                htcrr_tool(triggeruuid);
                $('#m_datatable_tool_htcrr').DataTable().ajax.reload();
            }
            else {
                let table = $('#m_datatable_tool_htcrr').DataTable();
                table.destroy();
                triggeruuid = $(this).data('uuid');
                htcrr_tool(triggeruuid);
                $('#m_datatable_tool_htcrr').DataTable().ajax.reload();
            }
        });
    }
};
function htcrr_tool(triggeruuid) {
    $("#m_datatable_tool_htcrr").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/project/"+triggeruuid+"/tools",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "pivot.unit"
            },
            {
                data: "pivot.note"
            }
        ]
    })

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');

};

function htcrr_material(triggeruuid) {
    $("#m_datatable_material_htcrr").DataTable({
        "dom": '<"top"f>rt<"bottom">pl',
        responsive: !0,
        searchDelay: 500,
        processing: !0,
        serverSide: !0,
        lengthMenu: [5, 10, 25, 50 ],
        pageLength:5,
        ajax: "/datatables/project/"+triggeruuid+"/materials",
        columns: [
            {
                data: "name"
            },
            {
                data: "pivot.quantity"
            },
            {
                data: "pivot.unit"
            },
            {
                data: "pivot.note"
            },
        ]
    })

    $('.paging_simple_numbers').addClass('pull-left');
    $('.dataTables_length').addClass('pull-right');
    $('.dataTables_info').addClass('pull-left');
    $('.dataTables_info').addClass('margin-info');
    $('.paging_simple_numbers').addClass('padding-datatable');

};

jQuery(document).ready(function () {
    Workpackage.init();
});

$('.m_taskcard_htcrr').on('click', function () {
    let table = $('.ht_crr_datatable').mDatatable();

    table.originalDataSet = [];
    table.reload();
});

$('.footer-manhour').on('click', '.add-manhour', function () {
    mApp.block(".add-manhour");
    
    let performa = $('#perfoma').val();
    let manhour = $('#total_mhrs').attr('value');
    manhour = parseFloat(manhour);
    let total = $('#total').html();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/project-hm/' + project_uuid + '/htcrr/manhoursPropotion',
        data: {
            _token: $('input[name=_token]').val(),
            manhour: manhour,
            performa_used: performa,
            total: total,
        },
        success: function (data) {
            mApp.unblock(".add-manhour");
            if (data.errors) {
            } else {

                toastr.success('Manhours Propotion has been created.', 'Success', {
                    timeOut: 5000
                });

                // window.location.href = '/discrepancy/' + data.uuid + '/edit';

            }
        }
    });
});

$('.m_tabs_manhour').on('click', function () {
    if(anyChanges){
        $.ajax({
        url: "/project-htcrr/"+project_uuid+"/getManhours",
        method: "get",
        success: function(dataFetched){
            $('#total_mhrs').html(dataFetched.total_mhrs);
            $('#total').html(dataFetched.mhrs_pfrm_factor);
        },
        });
    }
});

$('.m_tabs_enginner').on('click', function () {
    if(anyChanges){
        let csrf = $('meta[name="csrf-token"]').attr('content');
        let url = '/project-htcrr/' + project_uuid  + '/project-htcrr/create';
        let form = $('<form action="' + url + '" method="GET">' +
        '<input type="hidden" name="anyChanges" value="' + anyChanges + '" />' +
        '<input name="_token" value="'+csrf+'" type="hidden">' +
        '</form>');
        $('body').append(form);
        form.submit();
    }
});