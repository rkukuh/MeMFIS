let InventoryOut = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };
        $('.inventory_out_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/inventory-out/material',
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
                    field: '#',
                    title: 'No',
                    width: '40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'inventoried_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.inventoried_at
                    }
                },
                {
                    field: '',
                    title: 'Inventory Out No.',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'storage_id',
                    title: 'Storage',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.storage_id
                    }
                },
                {
                    field: 'number',
                    title: 'Ref Doc',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return '<a href="/inventory-out/material/' + t.uuid + '">' + t.number + "</a>"
                    }
                },
                {
                    field: 'description',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.description
                    }
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
                            '<a href="/inventory-out/material/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                            '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-uuid="' + t.uuid + '">' +
                            '<i class="la la-check"></i>' +
                            '</a>' +
                            '<a href="inventory-out/material/' + t.uuid + '/print" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill print" title="Print" data-id="' + t.uuid + '">' +
                            '<i class="la la-print"></i>' +
                            '</a>'

                        );
                    }
                }
            ]
        });

        $('.inventory_out_datatable').on('click', '.delete', function () {
            let inventory_uuid = $(this).data('id');

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
                            url: '/inventory-out/material/' + inventory_uuid + '',
                            success: function (data) {
                                toastr.success('Inventory has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.inventory_out_datatable').mDatatable();

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

        $('.inventory_out_datatable').on('click', '.approve', function () {
            let inventory_uuid = $(this).data('uuid');

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
                            url: '/inventory-out/material/' + inventory_uuid + '/approve',
                            success: function (data) {
                                toastr.success('Inventory out has been approved.', 'Approved', {
                                    timeOut: 5000
                                }
                                );

                                let table = $('.inventory_out_datatable').mDatatable();

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
    InventoryOut.init();
});
