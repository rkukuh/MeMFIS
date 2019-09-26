let Item = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/tool',

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
            columns: [{
                    field: 'code',
                    title: 'Part No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Material Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.unit.name + ' (' + t.unit.symbol + ')'
                    }
                },
                {
                    field: 'caterory',
                    title: 'Category',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return t.categories[0].name
                    }
                },
                {
                    field: "is_ppn",
                    title: "Taxable?",
                    template: function (t) {
                        if (t.is_ppn === 1) {
                            return '<span class="m-badge m-badge--brand m-badge--wide">PPN: ' + t.ppn_amount + '%</span>'
                        }
                        else {
                            return '<span class="m-badge m-badge--warning m-badge--wide">No</span>'
                        }
                    }
                },
                {
                    field: "is_stock",
                    title: "Stockable?",
                    template: function (t) {
                        if (t.is_stock) {
                            var e = {
                                1: {
                                    title: "Yes",
                                    class: "m-badge--brand"
                                },
                                0: {
                                    title: "No",
                                    class: " m-badge--warning"
                                }
                            };

                            return '<span class="m-badge ' + e[t.is_stock].class + ' m-badge--wide">' + e[t.is_stock].title + "</span>"
                            }
                        return ''
                    }
                },
                {
                    field: 'journal',
                    title: 'Account Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.journal) {
                            return t.journal.code
                        }

                        return ''
                    }
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/tool/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.item_datatable').on('click', '.delete', function () {
            let item_uuid = $(this).data('id');

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
                        url: '/tool/' + item_uuid + '',
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_datatable').mDatatable();

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
    Item.init();
});
