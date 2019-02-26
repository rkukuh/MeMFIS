let TaskCard = {
    init: function () {
        $('.tool_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/tools',
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
            perpage: 5,
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
                    field: 'pivot.item_id',
                    title: 'Tool',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill tool-delete" title="Delete" ' +
                            'data-taskcard_id="' + t.pivot.taskcard_id + '" ' +
                            'data-item_id="' + t.pivot.item_id + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.tool_datatable').on('click', '.tool-delete', function () {
            let item_uuid = $(this).data('item_uuid');
            let unit_id = $(this).data('unit_id');

            swal({
                title: 'Sure want to remove?',
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
                        url: '/taskcard-routine/' + taskcard_id + '/' + item_id+'/item/',
                        success: function (data) {
                            toastr.success('Material has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.item_unit_datatable').mDatatable();

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

        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard-routine/'+taskcard_uuid+'/materials',
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
            perpage: 5,
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
                    field: 'pivot.item_id',
                    title: 'Material',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material-delete" title="Delete" ' +
                            'data-item_id="' + t.uuid + '" ' +
                            'data-unit_id="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.threshold_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard/threshold/',
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
                perpage: 5,
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
            columns: [{
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                            'data-item_id="' + t.uuid + '" ' +
                            'data-unit_id="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.repeat_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard/repeat',
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
                perpage: 5,
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
            columns: [{
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                            'data-item_id="' + t.uuid + '" ' +
                            'data-unit_id="' + t.uuid + '">' +
                            '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        $('.add-tool').on('click', function () {
            let quantity = $('input[name=quantity]').val();
            let tool = $('#tool').val();
            let unit_tool = $('#unit_tool').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/taskcard/'+TaskCard_uuid+'/item',
                data: {
                    _token: $('input[name=_token]').val(),
                    item_id: tool,
                    quantity: quantity,
                    // unit_tool: unit_tool,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.item_id) {
                            $('#tool-error').html(data.errors.item_id[0]);
                        }

                        if (data.errors.quantity) {
                            $('#quantity-error').html(data.errors.quantity[0]);
                        }

                        // if (data.errors.taskcard_routine_type) {
                        //     $('#unit_tool-error').html(data.errors.taskcard_routine_type[0]);
                        // }

                        document.getElementById('tool').value = tool;
                        document.getElementById('quantity').value = quantity;
                        // document.getElementById('unit_tool').value = unit_tool;

                    } else {

                        toastr.success('Tool has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.tool_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();

                    }
                }
            });
        });
        $('.add-item').on('click', function () {
            alert('tes');
        });

        $(document).ready(function () {
            $('.reset-item').removeClass('reset');
        });

        $('.footer').on('click', '.reset', function () {
            window.location.href = '/taskcard/1/edit';
        });

        $('.reset-item').on('click', function () {
            document.getElementById('quantity').value = '';

            $('#item').select2('val', 'All');
            $('#item_unit_id').select2('val', 'All');

            $('#item-error').html('');
            $('#quantity-error').html('');
            $('#unit-error').html('');

        });


        $(document).ready(function () {

            $('.btn-success').removeClass('add');
        });

        $('.footer').on('click', '.reset', function () {
            taskcard_reset();
        });


        $('.footer').on('click', '.edit-taskcard', function () {
            // taskcard_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let taskcard_routine_type = $('#taskcard_routine_type').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let task_type_id = $('#task_type_id').val();
            let otr_certification = $('#otr_certification').val();
            let manhour = $('input[name=manhour]').val();
            let performa = $('input[name=performa]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let work_area = $('#work_area').val();
            let access = $('#access').val();
            let zone = $('#zone').val();
            let source = $('input[name=source]').val();
            let relationship = $('#relationship').val();
            let version = $('#version').val();
            var JsonVersion = JSON.stringify(version);
            let effectivity = $('input[name=effectivity]').val();
            let description = $('#description').val();

            if ($('#applicability_airplane :selected').length > 0) {
                let applicability_airplanes = [];

                $('#applicability_airplane :selected').each(function (i, selected) {
                    applicability_airplanes[i] = $(selected).val();
                });
            }


            if ($('#access :selected').length > 0) {
                let accesses = [];

                $('#access :selected').each(function (i, selected) {
                    accesses[i] = $(selected).val();
                });
            }


            if ($('#zone :selected').length > 0) {
                let zones = [];

                $('#zone :selected').each(function (i, selected) {
                    zones[i] = $(selected).val();
                });
            }


            if ($('#relationship :selected').length > 0) {
                let relationships = [];

                $('#relationship :selected').each(function (i, selected) {
                    relationships[i] = $(selected).val();
                });
            }


            if ($('#version :selected').length > 0) {
                let versions = [];

                $('#version :selected').each(function (i, selected) {
                    versions[i] = $(selected).val();
                });
            }

            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/taskcard-routine/' + taskcard_uuid + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    number: number,
                    title: title,
                    type_id: taskcard_routine_type,
                    task_type_id: task_type_id,
                    work_area: work_area,
                    helper_quantity: helper_quantity,
                    is_rii: is_rii,
                    performance_factor: performa,
                    manhour: manhour,
                    description: description,
                    version: JsonVersion,
                    effectivity: effectivity,
                    source: source,

                    applicability_airplane: applicability_airplane,
                    otr_certification: otr_certification,
                    access: access,
                    zone: zone,
                    relationship: relationship,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.taskcard_routine_type) {
                            $('#taskcard_routine_type-error').html(data.errors.taskcard_routine_type[0]);
                        }

                        if (data.errors.otr_certification) {
                            $('#otr-certification-error').html(data.errors.otr_certification[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.task_type_id) {
                            $('#task_type_id-error').html(data.errors.task_type_id[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.performance_factor) {
                            $('#performa-error').html(data.errors.performance_factor[0]);
                        }


                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('taskcard_routine_type').value = taskcard_routine_type;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('task_type_id').value = task_type_id;
                        document.getElementById('otr_certification').value = otr_certification;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('performa').value = performa;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('work_area').value = work_area;
                        document.getElementById('access').value = access;
                        document.getElementById('zone').value = zone;
                        document.getElementById('source').value = source;
                        document.getElementById('relationship').value = relationship;
                        document.getElementById('version').value = version;
                        document.getElementById('effectifity').value = effectifity;
                        document.getElementById('description').value = description;

                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
