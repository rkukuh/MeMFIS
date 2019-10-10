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
                    title: 'Defect No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/defectcard/'+t.uuid+'/">' + t.code + "</a>"
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
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.jobcard.jobcardable.uuid+'">' + t.jobcard.jobcardable.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.quotation.quotationable.customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft_register',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft_sn',
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
                    field: 'actual',
                    title: 'Actual Mhrs.',
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
                            '<a href="defectcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
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
                    title: 'Defect No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/defectcard/'+t.uuid+'/edit ">' + t.code + "</a>"
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
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return '<a href="/taskcard/'+t.jobcard.jobcardable.uuid+'">' + t.jobcard.jobcardable.number + "</a>"
                    }
                },
                {
                    field: 'jobcard.quotation.quotationable.customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft_register',
                    title: 'A/C Reg',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.quotation.quotationable.aircraft_sn',
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
                    field: 'actual',
                    title: 'Actual Mhrs.',
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
                            '<a href="defectcard/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
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
