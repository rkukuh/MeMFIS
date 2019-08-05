
let Benefit = {
    init: function () {
        $('.benefit_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/customer',
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
            columns: [{
                    field: 'name',
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/customer/'+t.uuid+'">' + t.name + "</a>"
                    }
                },
                {
                    field: 'addresses',
                    title: 'Benefits Name',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.addresses[0]){
                            return t.addresses[0].address
                        }else{
                            return ""
                        }
                    }
                },
                {
                    field: 'phones',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if(t.phones[0]){
                            return t.phones[0].number
                        }else{
                            return ""
                        }
                    }
                }
            ]
        });

        let remove = $('.position_datatable').on('click', '.delete', function () {
            let triggerid = $(this).data('id');

            swal({
                title: 'Are you sure?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/customer/' + triggerid + '',
                        success: function (data) {
                            toastr.success('Position has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );
                        let table = $('.position_datatable').mDatatable();

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

                }
            });
        });

    }
};

jQuery(document).ready(function () {
    Benefit.init();
});
