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
    let applicability_airplane = $('#applicability_airplane').val();
    let otr_certification = $('#otr_certification').val();
    let task_card_no = $('#task_card_no').val();

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
            applicability_airplane: applicability_airplane,
            otr_certification: otr_certification,
            task_card_no: task_card_no,
        },
        success: function(response) {
            let table = $('.job_card_datatable').mDatatable();
            table.destroy();
            table = $('.job_card_datatable').mDatatable({
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

            table.reload();

        }
    });
});

let dateIssued = {
    init: function () {
        $('#date_issued').select2({
            placeholder: 'Select a date issued '
        });
    }
};

let jcNo = {
    init: function () {
        $('#task_card_no').select2({
            placeholder: 'Select a Task Card Number '
        });
    }
};

let projectNo = {
    init: function () {
        $('#project_no').select2({
            placeholder: 'Select a Project Number '
        });
    }
};

let jobcardStatus = {
    init: function () {
        $('#status_jobcard').select2({
            placeholder: 'Select a Job Card Status '
        });
    }
};

$('select[name="date_issued"]').append('<option value="asc">Ascending</option>');
$('select[name="task_card_no"]').append('<option value="asc">Ascending</option>');
$('select[name="project_no"]').append('<option value="asc">Ascending</option>');

$('select[name="date_issued"]').append('<option value="desc">Descending</option>');
$('select[name="task_card_no"]').append('<option value="desc">Descending</option>');
$('select[name="project_no"]').append('<option value="desc">Descending</option>');

$('select[name="status_jobcard"]').append('<option value="Open">Open</option>');
$('select[name="status_jobcard"]').append('<option value="On Progress">On Progress</option>');
$('select[name="status_jobcard"]').append('<option value="Pending/Pause">Pending/Pause</option>');
$('select[name="status_jobcard"]').append('<option value="Closed">Closed</option>');

$(document).ready(function () {
    dateIssued.init();
    jcNo.init();
    projectNo.init();
    jobcardStatus.init();
});