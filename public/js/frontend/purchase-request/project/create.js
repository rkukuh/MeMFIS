let PurchaseRequestProject = {
    init: function () {
        function item(triggeruuid) {
            $('.item_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/purchase-request/project/item/'+triggeruuid,

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
                columns: [{
                        field: 'item.code',
                        title: 'Part Number',
                        sortable: 'asc',
                        filterable: !1,
                        template: function (t) {
                            return '<a href="/item/'+t.item.uuid+'">' + t.item.code + "</a>"
                        }
                    },
                    {
                        field: 'item.name',
                        title: 'Item Description',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: '',
                        title: 'Project Requirement Qty',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: '',
                        title: 'Stock Available',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: "quantity",
                        title: "Request Qty",
                    },
                    {
                        field: "item.unit.name",
                        title: "Unit",
                    },
                    {
                        field: "",
                        title: "Remark",
                    },
                ]
            });
        };

        let item_datatables_init = true;

        $(document).ready(function () {
            $('select[name="project"]').on('change', function () {
                if (item_datatables_init == true) {
                    item_datatables_init = false;
                    triggeruuid = $('#project').val();
                    item(triggeruuid);
                    table = $(".item_datatable").mDatatable();
                    table.originalDataSet = [];
                    table.reload();
            } else {
                let table = $('.item_datatable').mDatatable();
                table.destroy();
                triggeruuid = $('#project').val();
                item(triggeruuid);
                table = $(".item_datatable").mDatatable();
                table.originalDataSet = [];
                table.reload();
                item_datatables_init = true;

                }
            });
        });

        $('.footer').on('click', '.add-pr', function () {
            let number = $('input[name=number]').val();
            let project_id = $('#project').val();
            let date = $('input[name=date]').val();
            let date_required = $('input[name=date-required]').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-request-project',
                type: 'POST',
                data: {
                    number:number,
                    project_id: project_id,
                    requested_at:date,
                    required_at:date_required,
                    description:description,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Purchase Request has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-request-project/'+response.uuid+'/edit';
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    PurchaseRequestProject.init();
});
