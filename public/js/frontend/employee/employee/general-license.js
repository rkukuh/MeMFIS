let Employee = {
    init: function () {

        $('.m_datatable_general_license').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/get-general-licenses',

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
                serverFiltering: !0,
                serverSorting: !0
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
                input: $('#generalSearch4')
            },
            toolbar: {
                items: {
                    pagination: {
                        pageSizeSelect: [5, 10, 20, 30, 50, 100]
                    }
                }
            },
            columns: [{
                    field: 'code',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    // width: 100
                },
                {
                    field: 'employee_id',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    width: 250
                },
                {
                    field: 'license_id',
                    title: 'License',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aciation_degree',
                    title: 'Aciation Degree',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'exam_no',
                    title: 'Exam No',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'exam_date',
                    title: 'Exam Date',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'attendace_no',
                    title: 'Attendace No',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'issued_at',
                    title: 'Issued At',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'valid_until',
                    title: 'Valid Until',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'revoke_at',
                    title: 'Revoke At',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'Actions',
                    // width: 170,
                    title: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="item/' + t.uuid + '" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" ' +
                            '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t' +
                            '<a href="item/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</a\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        let remove_general_license = $('.m_datatable_general_license').on('click', '.delete', function () {
            let triggerid = $(this).data('id');

            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/item/' + triggerid + '',
                        success: function (data) {
                            toastr.success(
                                'Data berhasil dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.m_datatable_general_license').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errorsHtml = '';
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                    swal(
                        'Deleted!',
                        'Your imaginary file has been deleted.',
                        'success'
                    );
                } else {
                    swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        });




    }
};

jQuery(document).ready(function () {
    Employee.init();
});
