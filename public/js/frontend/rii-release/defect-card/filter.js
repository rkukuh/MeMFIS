
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
    let date = $('#date').val();
    let jc_no = $('#jc_no').val();
    let customer = $('#customer').val();
    let applicability_airplane = $('#applicability_airplane').val();
    let otr_certification = $('#otr_certification').val();
    let status = $('#status').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/datatables/rii-release-defectcard/filter',
        data: {
            _token: $('input[name=_token]').val(),
            date: date,
            jc_no: jc_no,
            customer: customer,
            applicability_airplane: applicability_airplane,
            otr_certification: otr_certification,
            status: status,
        },
        success: function (response) {
            let table = $('.riirelease_datatable').mDatatable();
            table.destroy();
            table = $('.riirelease_datatable').mDatatable({
                data: {
                    type: "local",
                    source: response,
                    pageSize: 10,
                    serverPaging: !0,
                serverFiltering: !1,
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
                        title: 'No',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'title',
                        title: 'Date',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'type.name',
                        title: 'TaskCard No',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'pesawat',
                        title: 'Company Task No',
                        sortable: 'asc',
                        filterable: !1,

                    },
                    {
                        field: 'skill',
                        title: 'Customer',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'task.name',
                        title: 'A/C Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'estimation_manhour',
                        title: 'A/C Reg',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'A/C Serial No',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'Skill',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'Mhrs',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'Status',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'Actions',
                        sortable: !1,
                        overflow: 'visible',
                        template: function (t, e, i) {

                                return (
                                    '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
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
        $('#date').select2({
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

let jobcardStatus = {
    init: function () {
        $('#status').select2({
            placeholder: 'Select a Task Release Status '
        });
    }
};

$('select[name="date"]').append('<option value="Ascending">Ascending</option>');
$('select[name="jc_no"]').append('<option value="Ascending">Ascending</option>');

$('select[name="date"]').append('<option value="Descending">Descending</option>');
$('select[name="jc_no"]').append('<option value="Descending">Descending</option>');

$('select[name="status"]').append('<option value="Open">Open</option>');
$('select[name="status"]').append('<option value="On Progress">On Progress</option>');
$('select[name="status"]').append('<option value="Pending/Pause">Pending/Pause</option>');
$('select[name="status"]').append('<option value="Closed">Closed</option>');

$(document).ready(function () {
    dateIssued.init();
    jcNo.init();
    jobcardStatus.init();
});
