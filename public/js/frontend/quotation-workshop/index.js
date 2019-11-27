let Quotation = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };
        $('.m_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation',
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
                        if(t.quotation_type == "Quotation Project"){
                            return '<a href="/quotation/'+t.uuid+'">' + t.number + "</a>"
                        }else{
                            return '<a href="/quotation-additional/'+t.uuid+'">' + t.number + "</a>"
                        }
                    }
                },
                {
                    field: 'quotationable.no_wo',
                    title: 'Work Order No',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'quotationable.code',
                    title: 'Project No',
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
                    field: 'created_by',
                    title: 'Created By',
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
                    field: 'quotation_type',
                    title: 'Quotation Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Approve By',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e , i){
                        if(t.conducted_by){
                            return t.conducted_by+" "+t.conducted_at;
                        }else{
                            return "-";
                        }
                    },
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.quotation_type == "Quotation Project"){
                            if(t.status == 'Approved'){
                                return (
                                    // '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    //     '<i class="la la-trash"></i>' +
                                    // '</a>'+
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
                                    // '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    //     '<i class="la la-trash"></i>' +
                                    // '</a>'+
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                        '<i class="la la-check"></i>' +
                                    '</a>'+
                                    '<a href="quotation/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                        '<i class="la la-print"></i>' +
                                    '</a>'

                                );
                            }

                        }else if(t.quotation_type == "Additional Quotation"){
                            // quotation-additional/
                            if(t.status == 'Approved'){
                                return (
                                    // '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    //     '<i class="la la-trash"></i>' +
                                    // '</a>'+
                                    '<a href="quotation-additional/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                        '<i class="la la-print"></i>' +
                                    '</a>'

                                );
                            }
                            else{
                                return (
                                    '<a href="/quotation-additional/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                        '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    // '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                    //     '<i class="la la-trash"></i>' +
                                    // '</a>'+
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve-additional" title="Approve Additional" data-id="' + t.uuid + '">' +
                                        '<i class="la la-check"></i>' +
                                    '</a>'+
                                    '<a href="quotation-additional/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                        '<i class="la la-print"></i>' +
                                    '</a>'

                                );
                            }
                        }
                    }
                }
            ]
        });

        $('.m_datatable').on('click', '.delete', function () {
            let quotation_uuid = $(this).data('id');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/quotation/' + quotation_uuid + '',
                        success: function (data) {
                            toastr.success('Quotation has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });

        $('.m_datatable').on('click', '.approve', function () {
            let quotation_uuid = $(this).data('id');


            swal({
                title: 'Sure want to Approve?',
                text: "Whose approval (Customer side)?",
                type: 'question',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'on'
                },
                confirmButtonText: 'Yes, Approve',
                confirmButtonColor: '#34bfa3',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                showLoaderOnConfirm: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'POST',
                        data: {
                            note:result.value 
                        },
                        url: '/quotation/' + quotation_uuid + '/approve',
                        success: function (data) {
                            toastr.success('Quotation has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;
                            toastr.error(errors.message, errors.title, {
                                "closeButton": true,
                                "timeOut": "0",
                            }
                            );
                        }
                    });
                }
            });
        });

        $('.m_datatable').on('click', '.approve-additional', function () {
            let quotation_uuid = $(this).data('id');

            swal({
                title: 'Sure want to Approve?',
                text: "Whose approval (Customer side)?",
                type: 'question',
                input: 'text',
                inputAttributes: {
                  autocapitalize: 'on'
                },
                confirmButtonText: 'Yes, Approve',
                confirmButtonColor: '#34bfa3',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                showLoaderOnConfirm: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'POST',
                        data: {
                            note:result.value 
                        },
                        url: '/quotation-additional/' + quotation_uuid + '/approve',
                        success: function (data) {
                            toastr.success('Quotation has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;
                            toastr.error(errors.message, errors.title, {
                                "closeButton": true,
                                "timeOut": "0",
                            }
                            );
                        }
                    });
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    Quotation.init();
});