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
    let project_no = $('#project_no').val();
    let date_issued = $('#date_issued').val();
    let jc_no = $('#jc_no').val();
    let customer = $('#customer').val();
    let status_jobcard = $('#status_jobcard').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/datatables/jobcard/filter',
        data: {
            _token: $('input[name=_token]').val(),
            taskcard_routine_type: taskcard_routine_type,
            task_type_id: task_type_id,
            aircrafts: aircrafts,
            skills: skills,
            project_no: project_no,
            date_issued: date_issued,
            jc_no: jc_no,
            customer: customer,
            status_jobcard: status_jobcard,
        },
        success: function(response) {
            let table = $('.job_card_datatable_ppc').mDatatable();
            table.destroy();
            table = $('.job_card_datatable_ppc').mDatatable({
                data: {
                    type: "local",
                    source: response,
                    pageSize: 10,
                    serverPaging: !0,
                serverFiltering: !0,
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
                        title: 'JC No.',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t, e, i) {
                                return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                        }
                    },
                    {
                        field: 'taskcard.number',
                        title: 'TC No',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'taskcard.title',
                        title: 'Title',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'taskcard.type.name',
                        title: 'Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'taskcard.task.name',
                        title: 'Task',
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
                        field: 'taskcard.skill.name',
                        title: 'Skill',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: '1',
                        title: 'Material',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t, e, i) {
                            return (
                                '<button data-toggle="modal" data-target="#modal_material" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                            );
                        }

                    },
                    {
                        field: '2',
                        title: 'Tool',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t, e, i) {
                            return (
                                '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                                t.uuid +
                                '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                            );
                        }
                    },
                    {
                        field: 'taskcard.estimation_manhour',
                        title: 'Est. Mhrs',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'taskcard.estimation_manhour',
                        title: 'Actual. Mhrs',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'status.name',
                        title: 'Status',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'actions',
                        sortable: !1,
                        overflow: 'visible',
                        template: function (t, e, i) {
                            return (
                                '<a href="jobcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-print"></i>' +
                                '</a>'
                            );
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
        $('#jc_no').select2({
            placeholder: 'Select a JC Number '
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
$('select[name="jc_no"]').append('<option value="asc">Ascending</option>');
$('select[name="project_no"]').append('<option value="asc">Ascending</option>');

$('select[name="date_issued"]').append('<option value="desc">Descending</option>');
$('select[name="jc_no"]').append('<option value="desc">Descending</option>');
$('select[name="project_no"]').append('<option value="desc">Descending</option>');

$('select[name="status_jobcard"]').append('<option value="23">Open</option>');
$('select[name="status_jobcard"]').append('<option value="24">On Progress</option>');
$('select[name="status_jobcard"]').append('<option value="25">Pending/Pause</option>');
$('select[name="status_jobcard"]').append('<option value="26">Closed</option>');
$('select[name="status_jobcard"]').append('<option value="27">RELEASED</option>');
$('select[name="status_jobcard"]').append('<option value="28">RII RELEASED</option>');

$(document).ready(function () {
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
    $('#taskcard_routine_type').select2();
});

$(document).ready(function () {
    dateIssued.init();
    jcNo.init();
    projectNo.init();
    jobcardStatus.init();
});
