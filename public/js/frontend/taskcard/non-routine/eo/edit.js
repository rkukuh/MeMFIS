let TaskCard = {
    init: function () {
        $('.instruction_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-eo/'+taskcard_uuid+'/eo-instructions',
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
                serverFiltering: !0,
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
                    field: 'work_area',
                    title: 'Work Area',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Manhour',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'engineer_quantity',
                    title: 'Engineer Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'helper_quantity',
                    title: 'Helper Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'is_rii',
                    title: 'Rii?',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
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

                        return '<span class="m-badge ' + e[t.is_rii].class + ' m-badge--wide">' + e[t.is_rii].title + "</span>"
                    }

                },
                {
                    field: 'performance_factor',
                    title: 'Performance Factor',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'sequence',
                    title: 'Sequence',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '1',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }

                },
                {
                    field: '2',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_tool" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool" title="Tool" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_instruction" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-uuid=' +
                            t.uuid +
                            ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });

        $('.add-instruction').on('click', function () {
            let work_area = $('#work_area').val();
            let manhour = $('input[name=manhour]').val();
            let performa = $('input[name=performa]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let engineer_quantity = $('input[name=engineer_quantity]').val();
            let sequence = $('input[name=sequence]').val();
            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard-eo/'+taskcard_uuid+'/eo-instruction',
                data: {
                    _token: $('input[name=_token]').val(),
                    work_area: work_area,
                    estimation_manhour: manhour,
                    performance_factor: performa,
                    helper_quantity: helper_quantity,
                    engineer_quantity: engineer_quantity,
                    sequence: sequence,
                    is_rii: is_rii,
                    // unit_item: unit_material,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.item_id) {
                        //     $('#material-error').html(data.errors.item_id[0]);
                        // }

                        // if (data.errors.quantity) {
                        //     $('#quantity_item-error').html(data.errors.quantity[0]);
                        // }
                        // document.getElementById('material').value = material;
                        // document.getElementById('quantity').value = quantity;

                    } else {

                        toastr.success('Instruction has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.instruction_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                        $('#modal_instruction').modal('hide');
                        // document.getElementById('uom_quantity').value = '';

                        // $('#item_unit_id').select2('val', 'All');


                    }
                }
            });
        });
        let material_datatables_init = true;
        let material = $('.instruction_datatable').on('click', '.material', function () {
            if(material_datatables_init == true){
                material_datatables_init = false;
                let triggeruuid = $(this).data('uuid');
                EO_item.init(triggeruuid);
            }
        });
        let tool_datatables_init = true;
        let tool = $('.instruction_datatable').on('click', '.tool', function () {
            if(tool_datatables_init == true){
                tool_datatables_init = false;
                let triggeruuid = $(this).data('uuid');
                EO_tool.init(triggeruuid);
            }
        });

        let edit = $('.instruction_datatable').on('click', '.edit', function () {
            let triggeruuid = $(this).data('uuid');
            alert('tes');

        });
        let remove = $('.instruction_datatable').on('click', '.delete', function () {
            let triggeruuid = $(this).data('uuid');

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
                        url: '/taskcard-eo/'+taskcard_uuid+'/eo-instruction/'+ triggeruuid + '/',
                        success: function (data) {
                            toastr.success('Instruction has been deleted.', 'Deleted', {
                                timeOut: 5000
                            }
                        );

                            let table = $('.instruction_datatable').mDatatable();

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
    TaskCard.init();
});
