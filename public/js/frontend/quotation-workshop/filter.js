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
    let quotation_status_filter = $('#quotation_status_filter').val();
    let customer = $('#customer').val();
    let quotation_type_filter = $('#quotation_type_filter').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: '/datatables/quotation/filter',
        data: {
            _token: $('input[name=_token]').val(),
            quotation_status_filter: quotation_status_filter,
            customer: customer,
            quotation_type_filter: quotation_type_filter,
        },
        success: function(response) {
            let table = $('.job_card_datatable').mDatatable();
            table.destroy();
            table = $('.job_card_datatable').mDatatable({
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
                        field: 'requested_at',
                        title: 'Date',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'customer.name',
                        title: 'Customer',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'number',
                        title: 'Quotation No',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                        template: function (t) {
                            return '<a href="/quotation/'+t.uuid+'">' + t.number + "</a>"
                        }
                    },
                    {
                        field: 'project.no_wo',
                        title: 'Work Order No',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'project.code',
                        title: 'Project',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'description',
                        title: 'Description',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
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
                        field: '',
                        title: 'Created By',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: '',
                        title: 'Quotation Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'status',
                        title: 'Status',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'Actions',
                        sortable: !1,
                        overflow: 'visible',
                        template: function (t, e, i) {
                            if(t.status == 'Approved'){
                                return (
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'+
                                    '<a href="quotation/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                        '<i class="la la-print"></i>' +
                                    '</a>'
    
                                );
                            }
                            else{
                                return (
                                    '<a href="/quotation/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                    '</a>'+
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                        '<i class="la la-check"></i>' +
                                    '</a>'+
                                    '<a href="quotation/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                        '<i class="la la-print"></i>' +
                                    '</a>'
    
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

$('select[name="quotation_status_filter"]').append('<option value="Project">Project</option>');
$('select[name="quotation_status_filter"]').append('<option value="Additional">Additional</option>');
$('select[name="quotation_status_filter"]').append('<option value="Service">Service</option>');
$('select[name="quotation_type_filter"]').append('<option value="Open">Open</option>');
$('select[name="quotation_type_filter"]').append('<option value="Approved">Approved</option>');
$('select[name="quotation_type_filter"]').append('<option value="Closed">Closed</option>');
$('select[name="quotation_type_filter"]').append('<option value="Void">Void</option>');

let quotation_status_filter = {
    init: function () {
        $('#quotation_status_filter').select2({
            placeholder: 'Select a Status '
        });
    }
};

let quotation_type_filter = {
    init: function () {
        $('#quotation_type_filter').select2({
            placeholder: 'Select a Type '
        });
    }
};

$(document).ready(function () {
    quotation_status_filter.init();
    quotation_type_filter.init();
});