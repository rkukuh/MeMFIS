let TaskCard = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.Discrepancy_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/discrepancy/engineer',
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
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Discrepancy No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/discrepancy-engineer/'+t.uuid+'/edit">' + t.code + "</a>"
                    }
                },
                {
                    field: 'jobcard.number',
                    title: 'JobCard Reference',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/jobcard/'+t.jobcard.uuid+'/edit">' + t.jobcard.number + "</a>"
                    }
                },
                {
                    field: 'tc_number',
                    title: 'Taskcard No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.tc_uuid+'">' + t.tc_number + "</a>"
                    }
                },
                {
                    field: 'customer_name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'aircraft_sn',
                    title: 'A/C Serial No',
                    sortable: 'asc',
                    filterable: !1,

                },
                {
                    field: 'jobcardSkill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'RII',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.is_rii == 0) {
                            return (
                                '<p>No</p>'
                            );
                        }else{
                            return (
                                '<p>Yes</p>'
                            );
                        }
                    }
                },
                {
                    field: 'Status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.status == "mechanic"){
                            return (
                                'Open'
                            );
                        }
                        else if(t.status == "engineer"){
                            return (
                                'Engineer Approved'
                            );
                        }
                        else if(t.status == "ppc"){
                            return (
                                'PPC Approved'
                            );
                        }
                        else{
                            return (
                                ''
                            );
                        }
                    }
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return t.created_by + '<br>' + t.create_date
                    }

                },
                {
                    field: 'updated_by',
                    title: 'Updated By',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return t.updated_by + '<br>' + t.update_date
                    }

                },
                {
                    field: '',
                    title: 'Approved By',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return t.conducted_by + '<br>' + t.conducted_at
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        if(t.status == "mechanic"){
                            return (
                                '<a href="/discrepancy-engineer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                    '<i class="la la-pencil"></i>' +
                                '</a>' +
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                '</a>'+
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-check"></i>' +
                                '</a>'
                            );
                        }
                        else if(t.status == "engineer" || t.status == "ppc"){
                            return ('<a href="/discrepancy-engineer/' + t.uuid + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Show" data-id="' + t.uuid +'">' +
                            '<i class="la la-eye"></i>');
                        }else{
                            return ('');
                        }
                    }
                }
            ]
        });

        let remove = $('.Discrepancy_datatable').on('click', '.delete', function () {
            let discrepancy_uuid = $(this).data('uuid');

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
                        url: '/discrepancy-engineer/' + discrepancy_uuid + '',
                        success: function (data) {
                            toastr.success('Discrepancy has been deleted.', 'Deleted', {
                                timeOut: 5000
                                }
                            );

                            let table = $('.Discrepancy_datatable').mDatatable();

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

        $('.Discrepancy_datatable').on('click', '.approve', function () {
            let discrepancy_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to Approve?',
                type: 'question',
                confirmButtonText: 'Yes, Approve',
                confirmButtonColor: '#34bfa3',
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
                        type: 'PUT',
                        url: '/discrepancy/' + discrepancy_uuid + '/engineer/approve',
                        success: function (data) {
                            toastr.success('Discrepancy has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.Discrepancy_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function(jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;
                            $.each(errors, function(index, value) {
                                toastr.error(value.message, value.title, {
                                    closeButton: true,
                                    timeOut: "0"
                                });
                            });
                        }
                    });
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
