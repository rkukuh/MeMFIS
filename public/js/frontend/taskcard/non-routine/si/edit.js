let TaskCard = {
    init: function () {
        $('.tool_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard/item/',
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
            columns: [{
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
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
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/taskcard/item/',
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
            columns: [{
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                {
                    field: 'quantity',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150,
                    template: function (t) {
                        return t.name + ' (' + t.symbol + ')'
                    }
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
            let otr_certification = $('#otr_certification').val();
            let applicability_airplane = $('#applicability_airplane').val();
            let work_area = $('#work_area').val();
            let manhour = $('input[name=manhour]').val();
            let helper_quantity = $('input[name=helper_quantity]').val();
            let instruction = $('#instruction').val();

            if ($('#applicability_airplane :selected').length > 0) {
                var applicability_airplanes = [];

                $('#applicability_airplane :selected').each(function (i, selected) {
                    applicability_airplanes[i] = $(selected).val();
                });
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/taskcard-si/' + taskcard_uuid + '/',
                data: {
                    _token: $('input[name=_token]').val(),
                    title: title,
                    type_id: '89',
                    number: number,
                    work_area: work_area,
                    manhour: manhour,
                    helper_quantity: helper_quantity,
                    description: instruction,

                    otr_certification: otr_certification,
                    applicability_airplane: applicability_airplane,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.title) {
                            $('#title-error').html(data.errors.title[0]);
                        }

                        if (data.errors.number) {
                            $('#number-error').html(data.errors.number[0]);
                        }

                        if (data.errors.otr_certification) {
                            $('#otr-certification-error').html(data.errors.otr_certification[0]);
                        }

                        if (data.errors.applicability_airplane) {
                            $('#applicability_airplane-error').html(data.errors.applicability_airplane[0]);
                        }

                        if (data.errors.manhour) {
                            $('#manhour-error').html(data.errors.manhour[0]);
                        }

                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);
                        }


                        document.getElementById('title').value = title;
                        document.getElementById('number').value = number;
                        document.getElementById('otr_certification').value = otr_certification;
                        document.getElementById('applicability_airplane').value = applicability_airplane;
                        document.getElementById('work_area').value = work_area;
                        document.getElementById('manhour').value = manhour;
                        document.getElementById('helper_quantity').value = helper_quantity;
                        document.getElementById('instruction').value = instruction;

                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });

                    }
                }
            });
        });

        // Category

    }
};

jQuery(document).ready(function () {
    TaskCard.init();
});
