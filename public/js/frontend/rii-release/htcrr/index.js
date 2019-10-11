let RiiRelease = {
    init: function () {

        $('.riirelease_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/rii-release-htcrr',
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
                    field: 'code',
                    title: 'HTCRR No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-hardtime/'+t.uuid+'/edit">' + t.code + "</a>"
                    }
                },
                {
                    field: 'project.code',
                    title: 'Project No',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.code',
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'item.name',
                    title: 'Item Description',
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
                    field: 'removal',
                    title: 'Removal Manhour Est',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'installation',
                    title: 'Installation Manhour Est',
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
                    field: 'conducted_by',
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
                        if(t.status == 'Released'){
                            return (
                                '<a href="/jobcard-hardtime/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Open Job Card" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-external-link"></i>' +
                                '</a>'
                            );
                        }else{
                            return (
                                '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill release" title="Release" data-uuid="' + t.uuid +'">' +
                                    '<i class="la la-check-circle"></i>' +
                                '</a>' +
                                '<a href="/jobcard-hardtime/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Open Job Card" data-uuid="' + t.uuid + '">' +
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
                        url: '/riirelease-htcrr/' + jobcard_uuid + '/',
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
