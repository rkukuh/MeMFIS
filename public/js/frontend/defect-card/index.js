let DefectCard = {
  init: function () {

        $('.defectcard_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/defectcard/',

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
                    field: 'code',
                    title: 'Defect No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/defectcard-engineer/'+t.uuid+'/">' + t.code + "</a>"
                    }
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Reference.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.jobcard.uuid+'">' + t.jobcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.taskcard.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.jobcard.taskcard.uuid+'">' + t.jobcard.taskcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.quotation.project.customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft_register',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft_sn',
                    title: 'A/C Serial No',
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
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actual_manhour',
                    title: 'Actual Mhrs.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'progresses.0.status_id',
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
                            '<a href="jobcard/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.defectcard_engineer_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/defectcard/',

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
                    field: 'code',
                    title: 'Defect No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/defectcard-engineer/'+t.uuid+'/edit ">' + t.code + "</a>"
                    }
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Reference.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.jobcard.uuid+'">' + t.jobcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.taskcard.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.jobcard.taskcard.uuid+'">' + t.jobcard.taskcard.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.quotation.project.customer.name',
                    title: 'Cusromer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft_register',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.project.aircraft_sn',
                    title: 'A/C Serial No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.taskcard.skill.name',
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
                    field: 'actual_manhour',
                    title: 'Actual Mhrs.',
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
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="jobcard/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });
      $('.defectcard_datatable').on('click', '.approve', function () {
        let quotation_uuid = $(this).data('id');

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
                    type: 'DELETE',
                    // url: '/quotation/' + quotation_uuid + '',
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

  }
};

jQuery(document).ready(function () {
  DefectCard.init();
});
