$('.btn-filter').on('click', function () {
    $('.advanceFilter').slideToggle('slow', function () {
        $('#advanceFilter').removeClass('hidden');
    });
});

$('.filter').on('change', function () {
    let taskcard_routine_type = $('#taskcard_routine_type').val();
    let task_type_id = $('#task_type_id').val();
    let applicability_airplane = $('#applicability_airplane').val();
    let otr_certification = $('#otr_certification').val();
    let project_no = $('#project_no').val();
    let date_issued = $('#date_issued').val();
    let jc_no = $('#jc_no').val();
    let customer = $('#customer').val();
    let status_jobcard = $('#status_jobcard').val();

    console.log(taskcard_routine_type);
    console.log(task_type_id);
    console.log(applicability_airplane);
    console.log(otr_certification);
    console.log(project_no);
    console.log(date_issued);
    console.log(jc_no);
    console.log(customer);
    console.log(status_jobcard);
    // $.ajax({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     type: 'post',
    //     url: '/datatables/taskcard/filter',
    //     data: {
    //         _token: $('input[name=_token]').val(),
    //         taskcard_routine_type: taskcard_routine_type,
    //         task_type_id: task_type_id,
    //         applicability_airplane: applicability_airplane,
    //         otr_certification: otr_certification,
    //         project_no: project_no,
    //         date_issued: date_issued,
    //         jc_no: jc_no,
    //         customer: customer,
    //         status_jobcard: status_jobcard,
    //     },
    //     success: function(response) {
    //         let table = $('.taskcard_datatable').mDatatable();
    //         table.destroy();
    //         table = $('.taskcard_datatable').mDatatable({
    //             data: {
    //                 type: "local",
    //                 source: response,
    //                 pageSize: 10,
    //                 serverPaging: !1,
    //                 serverSorting: !1
    //             },
    //             layout: {
    //                 theme: 'default',
    //                 class: '',
    //                 scroll: false,
    //                 footer: !1
    //             },
    //             sortable: !0,
    //             filterable: !1,
    //             pagination: !0,
    //             search: {
    //                 input: $('#generalSearch')
    //             },
    //             toolbar: {
    //                 items: {
    //                     pagination: {
    //                         pageSizeSelect: [5, 10, 20, 30, 50, 100]
    //                     }
    //                 }
    //             },
    //             columns: [{
    //                     field: 'number',
    //                     title: 'Taskcard No',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                 },
    //                 {
    //                     field: 'title',
    //                     title: 'Title',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                     template: function(t, e, i) {
    //                         if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
    //                             return '<a href="/taskcard-routine/' + t.uuid + '">' + t.title + "</a>"
    //                         } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
    //                             return '<a href="/taskcard-eo/' + t.uuid + '">' + t.title + "</a>"
    //                         } else if (t.type.code == "si") {
    //                             return '<a href="/taskcard-si/' + t.uuid + '">' + t.title + "</a>"
    //                         } else if (t.type.code == "preliminary") {
    //                             return '<a href="/preliminary/' + t.uuid + '">' + t.title + "</a>"
    //                         } else {
    //                             return (
    //                                 'dummy'
    //                             );
    //                         }
    //                     }

    //                 },
    //                 {
    //                     field: 'type.name',
    //                     title: 'TC Type',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                 },
    //                 {
    //                     field: 'pesawat',
    //                     title: 'A/C',
    //                     sortable: 'asc',
    //                     filterable: !1,

    //                 },
    //                 {
    //                     field: 'skill',
    //                     title: 'Skill',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                 },
    //                 {
    //                     field: 'task.name',
    //                     title: 'Task Type',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                 },
    //                 {
    //                     field: 'estimation_manhour',
    //                     title: 'Manhours',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                 },
    //                 {
    //                     field: 'description',
    //                     title: 'Description',
    //                     sortable: 'asc',
    //                     filterable: !1,
    //                     template: function(t) {
    //                         if (t.description) {
    //                             data = strtrunc(t.description, 50);
    //                             return (
    //                                 '<p>' + data + '</p>'
    //                             );
    //                         }

    //                         return ''
    //                     }
    //                 },
    //                 {
    //                     field: 'Actions',
    //                     sortable: !1,
    //                     overflow: 'visible',
    //                     template: function(t, e, i) {
    //                         if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
    //                             return (
    //                                 '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
    //                                 '<i class="la la-pencil"></i>' +
    //                                 '</a>' +
    //                                 '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
    //                                 '<i class="la la-trash"></i>' +
    //                                 '</a>'
    //                             );
    //                         } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
    //                             return (
    //                                 '<a href="/taskcard-eo/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
    //                                 '<i class="la la-pencil"></i>' +
    //                                 '</a>' +
    //                                 '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
    //                                 '<i class="la la-trash"></i>' +
    //                                 '</a>'
    //                             );
    //                         } else if (t.type.code == "si") {
    //                             return (
    //                                 '<a href="/taskcard-si/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
    //                                 '<i class="la la-pencil"></i>' +
    //                                 '</a>' +
    //                                 '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
    //                                 '<i class="la la-trash"></i>' +
    //                                 '</a>'
    //                             );
    //                         } else if (t.type.code == "preliminary") {
    //                             return (
    //                                 '<a href="/preliminary/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
    //                                 '<i class="la la-pencil"></i>' +
    //                                 '</a>' +
    //                                 '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
    //                                 '<i class="la la-trash"></i>' +
    //                                 '</a>'
    //                             );
    //                         } else {
    //                             return (
    //                                 'dummy'
    //                             );
    //                         }
    //                     }
    //                 }
    //             ]
    //         });

    //         table.reload();

    //     }
    // });
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

$('select[name="date_issued"]').append('<option value="Ascending">Ascending</option>');
$('select[name="jc_no"]').append('<option value="Ascending">Ascending</option>');
$('select[name="project_no"]').append('<option value="Ascending">Ascending</option>');

$('select[name="date_issued"]').append('<option value="Descending">Descending</option>');
$('select[name="jc_no"]').append('<option value="Descending">Descending</option>');
$('select[name="project_no"]').append('<option value="Descending">Descending</option>');

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