$('.btn-filter').on('click', function () {
    $('.advanceFilter').slideToggle('slow', function () {
        $('#advanceFilter').removeClass('hidden');
    });
});

function strtrunc(str, max, add) {
    add = add || '...';
    return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
};

$('.filter').on('change', function () {
    let taskcard_routine_type = $('#taskcard_routine_type').val();
    let task_type_id = $('#task_type_id').val();
    let aircrafts = $('#applicability_airplane').val();
    let skills = $('#otr_certification').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/datatables/taskcard/filter',
        data: {
            _token: $('input[name=_token]').val(),
            taskcard_routine_type: taskcard_routine_type,
            task_type_id: task_type_id,
            aircrafts: aircrafts,
            skills: skills,
            // task_card_no: task_card_no,
        },
        success: function(response) {
            let table = $('.taskcard_datatable').mDatatable();
            table.destroy();
            table = $('.taskcard_datatable').mDatatable({
                data: {
                    type: "local",
                    source: response,
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
                        field: 'number',
                        title: 'Taskcard No',
                        sortable: 'asc',
                        filterable: !1,
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
                        field: 'type.name',
                        title: 'Taskcard Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'pesawat',
                        title: 'A/C Applicability',
                        sortable: 'asc',
                        filterable: !1,
    
                    },
                    {
                        field: 'skill',
                        title: 'Skill',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'task.name',
                        title: 'Task Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'work_area',
                        title: 'Work Area',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'estimation_manhour',
                        title: 'Manhours',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'Instruction',
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
                            if((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")){
                                return (
                                    '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            }
                            else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")){
                                return (
                                    '<a href="/taskcard-eo/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            }
                            else if(t.type.code == "si"){
                                return (
                                    '<a href="/taskcard-si/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            }
                            else if(t.type.code == "preliminary"){
                                return (
                                    '<a href="/preliminary/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            } else {
                                return (
                                    'dummy'
                                );
                            }
                        }
                    }
                ]
            });

            // table.reload();

        }
    });
});

$(document).ready(function () {
    $.ajax({
        url: '/get-takcard-routine-types/',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#taskcard_routine_type').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });

    $.ajax({
        url: '/get-takcard-non-routine-types/',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            $.each(data, function (key, value) {
                $('#taskcard_routine_type').append(
                    '<option value="' + key + '">' + value + '</option>'
                );
            });
        }
    });

});

