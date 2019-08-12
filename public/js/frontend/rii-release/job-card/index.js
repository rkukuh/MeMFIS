let RiiRelease = {
    init: function () {

        $('.riirelease_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/rii-release-jobcard',
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
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'taskcard.number',
                    title: 'TaskCard No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'number',
                    title: 'Job Card No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<a href="/riirelease-jobcard/'+t.uuid+'/edit">' + t.number + "</a>"
                        );
                    }
                },
                {
                    field: 'company',
                    title: 'Company Task No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        if(t.taskcard.additionals){
                            let company = t.taskcard.additionals;
                            obj = JSON.parse(company);
                            // console.log()
                            return (
                                obj.internal_number
                            );
                        }
                        else{
                            return(
                                ''
                            );
                        }
                    }
                },
                {
                    field: 'quotation.project.customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'quotation.project.aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'quotation.project.aircraft_register',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'quotation.project.aircraft_sn',
                    title: 'A/C Serial No',
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
                    field: 'taskcard.estimation_manhour',
                    title: 'Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actual',
                    title: 'Actual. Mhrs',
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
                        if(t.status == 'RII RELEASED'){
                            return (
                                '<a href="/jobcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Open Job Card" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-external-link"></i>' +
                                '</a>'
                            );
                        }else{
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill release" title="Release" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-check-circle"></i>' +
                                '</a>' +
                                '<a href="/jobcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Open Job Card" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-external-link"></i>' +
                                '</a>'
                            );
                        }
                    }
                }
            ]
        });
        $('.riirelease_datatable').on('click', '.release', function () {
            let jobcard_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to Release?',
                type: 'question',
                confirmButtonText: 'Yes, Release',
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
                        url: '/riirelease-jobcard/' + jobcard_uuid + '/',
                        success: function (data) {
                            toastr.success('RII has been released.', 'Released', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.riirelease_datatable').mDatatable();

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

    }
};

jQuery(document).ready(function () {
    RiiRelease.init();
});
