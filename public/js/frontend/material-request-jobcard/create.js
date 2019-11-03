let MaterialRequestCreate = {
    init: function () {

        $('#jc_ref_no').on('click', function () {
            $('#ref_project').prop("disabled", true);
            $('#ref_jobcard').removeAttr("disabled");
        });

        $('#project_ref_no').on('click', function () {
            $('#ref_jobcard').prop("disabled", true);
            $('#ref_project').removeAttr("disabled");
        });

        $("#ref_jobcard").change(function () {
            let jobcard_uuid = $(this).val();            

            $('.material_request_project_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/item-request/material/'+ jobcard_uuid +'/items',
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
                        field: 'code',
                        title: 'Part Number',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: '',
                        title: 'Serial Number',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'description',
                        title: 'Item Description',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: '',
                        title: 'Expired Date',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'pivot.quantity',
                        title: 'Qty',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'unit_name',
                        title: 'Unit',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    },
                    {
                        field: 'pivot.note',
                        title: 'Remark',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150,
                    }
                ]
            });
        });

        let remove = $('.material_request_project_datatable').on('click', '.delete', function () {
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
                        url: '/category/' + triggerid + '',
                        success: function (data) {
                            toastr.success(
                                'Data Berhasil Dihapus.',
                                'Sukses!', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.material_request_project_datatable').mDatatable();

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

        $('.footer').on('click', '.add-request', function () {
            let note = $('#remark').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();
            let received_by = $('#received-by').val();
            let jc_no = $("#ref_jobcard").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/item-request/material-request-jobcard',
                type: 'POST',
                data: {
                    jc_no : jc_no,
                    storage_id: storage_id,
                    requested_at: date,
                    note: note,
                    section: section_code,
                    received_by: received_by
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors);
                    } else {
                        toastr.success('Item Request has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/item-request/material-request-jobcard/'+response.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    MaterialRequestCreate.init();
});
