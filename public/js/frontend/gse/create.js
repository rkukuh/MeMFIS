let GseToolReturnedCreate = {
    init: function () {
        function item(uuid) {
            $(".gse_tool_returned_datatable").mDatatable({
                data: {
                    type: "remote",
                    source: {
                        read: {
                            method: "GET",
                            url: "/datatables/request/item/" + uuid,
                            map: function(raw) {
                                let dataSet = raw;

                                if (typeof raw.data !== "undefined") {
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
                    theme: "default",
                    class: "",
                    scroll: false,
                    footer: !1
                },
                sortable: !0,
                filterable: !1,
                pagination: !0,
                search: {
                    input: $("#generalSearch")
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
                        field: 'code',
                        title: 'Part Number',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'pivot.serial_number',
                        title: 'Serial Number',
                        sortable: 'asc',
                        filterable: !1,
                        width: 150
                    },
                    {
                        field: 'name',
                        title: 'Tool Description',
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

        let item_datatables_init = true;
        $('select[name="tool_request"]').on("change", function() {
            let uuid = $("#tool_request").val();
            let type = $("#type").val();
            if(type == "hm"){
                $.ajax({
                    url: '/label/get-tool-request-hm/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#project_number').html(data.project_no);
                        $('#ac_type').html(data.ac_type);
                        $('#ac_reg').html(data.ac_reg);
                    }
                });
            }else if(type == "defectcard"){
                $.ajax({
                    url: '/label/get-tool-request-defectcard/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#project_number').html(data.project_no);
                        $('#ac_type').html(data.ac_type);
                        $('#ac_reg').html(data.ac_reg);
                    }
                });
            }else if(type == "workshop"){
                $.ajax({
                    url: '/label/get-tool-request-workshop/'+uuid,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#workshop_number').html(data.workshop_no);
                        $('#pn').html(data.number);
                        $('#desc').html(data.description);
                    }
                });
            }else if(type == "inv_out"){
                //DO NOTHING
            }

            if (item_datatables_init == true) {
                item_datatables_init = false;
                item(uuid);
                table = $(".gse_tool_returned_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            } else {
                let table = $(".gse_tool_returned_datatable").mDatatable();
                table.destroy();
                item(uuid);
                table = $(".gse_tool_returned_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
            }
        });

        $('.footer').on('click', '.add-gse', function () {
            let request_id = $('#tool_request').val();
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
                    request_id:request_id,
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

                        window.location.href = '/gse/'+response.uuid+'/edit';
                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    GseToolReturnedCreate.init();
});
