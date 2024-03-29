let MaterialTransfer = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };
        $('.material_transfer_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/mutation/material-transfer',
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
                    field: 'mutated_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'number',
                    title: 'Material Transfer No.',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'storage_out.name',
                    title: 'Warehouse Out',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'storage_in.name',
                    title: 'Warehouse In',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Ref Doc.',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'note',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Updated By',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'conducted_by',
                    title: 'Approve By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/material-transfer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                '<i class="la la-check"></i>' +
                            '</a>'+
                            '<a href="material-transfer/'+t.uuid+'/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid +'">' +
                                '<i class="la la-print"></i>' +
                            '</a>'

                        );
                    }
                }
            ]
        });

        $('.material_transfer_datatable').on('click', '.approve', function () {
            let mutation_uuid = $(this).data('id');

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
                        type: 'POST',
                        url: '/material-transfer/' + mutation_uuid + '/approve',
                        success: function (data) {
                            toastr.success('Mutation has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.material_transfer_datatable').mDatatable();

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
    MaterialTransfer.init();
});
