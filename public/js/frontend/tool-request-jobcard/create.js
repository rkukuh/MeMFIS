let ToolRequestCreate = {
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

            $('.tool_request_project_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/jobcard/' + jobcard_uuid + '/tools',
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

        $('.footer').on('click', '.add-request', function () {
            let note = $('#description').val();
            let section_code = $('input[name=section_code]').val();
            let storage_id = $('#item_storage_id').val();
            let date = $('input[name=date]').val();
            let loaned = $('#loaned').val();
            let jc_no = $("#ref_jobcard").val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/item-request/tool-request-jobcard',
                type: 'POST',
                data: {
                    jc_no: jc_no,
                    storage_id: storage_id,
                    requested_at: date,
                    note: note,
                    section: section_code,
                    received_by: loaned
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors);
                    } else {
                        toastr.success('Item Request has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/item-request/tool-request-jobcard/' + response.uuid + '/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    ToolRequestCreate.init();
});
