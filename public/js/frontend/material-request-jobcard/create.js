let MaterialRequestCreate = {
    init: function () {
        var tableInit = true;

        function getJobcard() {
            $.ajax({
                url: '/get-jobcard/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    $('select[name="jc_no"]').empty();

                    $('select[name="jc_no"]').append(
                        '<option value=""> Select a Item</option>'
                    );

                    $.each(data, function (key, value) {
                        $('select[name="jc_no"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });
        };

        function getProjects() {
            $.ajax({
                url: '/get-projects/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('select[name="project"]').empty();

                    $('select[name="project"]').append(
                        '<option value=""> Select a Project</option>'
                    );

                    $.each(data, function (key, value) {
                        $('select[name="project"]').append(
                            '<option value="' + key + '">' + value + '</option>'
                        );
                    });
                }
            });
        };

        $('#jc_ref_no').on('click', function () {
            getJobcard();
            $('#ref_project').html('').prop("disabled", true);
            $('#ref_jobcard').removeAttr("disabled");
        });

        $('#project_ref_no').on('click', function () {
            getProjects();
            $('#ref_jobcard').html('').prop("disabled", true);
            $('#ref_project').removeAttr("disabled");
        });

        function createTable(type, uuid) {
            if (type == 'jc') {
                var url = '/datatables/jobcard/' + uuid + '/materials';
            } else if (type == 'project') {
                var url = '/datatables/project/additional/' + uuid + '/materials';
            }

            $('.material_request_project_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: url,
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
                        field: 'name',
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
        }

        $("#ref_jobcard").change(function () {
            if (tableInit == true) {
                tableInit = false;
                let jobcard_uuid = $(this).val();
                createTable('jc', jobcard_uuid);
            }
            else {
                let jobcard_uuid = $(this).val();
                let table = $(".material_request_project_datatable").mDatatable();
                table.destroy();
                createTable('jc', jobcard_uuid);
                table = $(".material_request_project_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        });

        $('#ref_project').change(function () {
            if (tableInit == true) {
                tableInit = false;
                let project_uuid = $(this).val();
                createTable('project', project_uuid);
            }
            else {
                let project_uuid = $(this).val();
                let table = $(".material_request_project_datatable").mDatatable();
                table.destroy();
                createTable('project', project_uuid);
                table = $(".material_request_project_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        });

        $('.footer').on('click', '.add-request', function () {
            let note = $('#description').val();
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
