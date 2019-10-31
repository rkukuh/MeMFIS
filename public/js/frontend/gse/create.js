let GseToolReturnedCreate = {
    init: function () {
        $('.gse_tool_returned_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/quotation',
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
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: function (row, index, datatable) {
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: '',
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
                    field: '',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: '',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: '',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                },
                {
                    field: 'Actions',
                    width: 110,
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('select[name="tool_request"]').on("change", function() {
            let uuid = $("#tool_request").val();
            let type = $("#type").val();
            if(type == "hm"){
                $.ajax({
                    url: '/get-tool-request-hm/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#project_number').html(data);
                        $('#ac_type').html(data);
                        $('#ac_reg').html(data);
                    }
                });
            }else if(type == "defectcard"){
                $.ajax({
                    url: '/get-tool-request-defectcard/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#project_number').html(data);
                        $('#ac_type').html(data);
                        $('#ac_reg').html(data);
                    }
                });
            }else if(type == "workshop"){
                $.ajax({
                    url: '/get-tool-request-workshop/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#workshop_number').html(data);
                        $('#pn').html(data);
                        $('#desc').html(data);
                    }
                });
            }else if(type == "inv_out"){
                //DO NOTHING
            }
        });

        let remove = $('.m_datatable').on('click', '.delete', function () {
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

                            let table = $('.m_datatable').mDatatable();

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

        $('.footer').on('click', '.add-gse', function () {
            let returned_at = $('input[name=date]').val();
            let storage = $('#item_storage_id').val();
            let section = $('input[name=section]').val();
            let returned_by = $('#employee').val();
            let note = $('#note').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/gse',
                type: 'POST',
                data: {
                    returned_at:returned_at,
                    section:section,
                    storage_id:storage,
                    returned_by:returned_by,
                    note:note,


                },
                success: function (response) {
                    if (response.errors) {
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('GSE has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/gse/'+response.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    GseToolReturnedCreate.init();
});
