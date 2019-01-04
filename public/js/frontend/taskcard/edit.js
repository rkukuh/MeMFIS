let Item = {
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
            columns: [
                {
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
                                'data-unit_id="' + t.uuid+ '">' +
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
            columns: [
                {
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                // {
                //     field: 'quantity',
                //     title: 'Quantity',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                // {
                //     field: 'unit',
                //     title: 'Unit',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.uuid + '" ' +
                                'data-unit_id="' + t.uuid+ '">' +
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
            columns: [
                {
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                // {
                //     field: 'quantity',
                //     title: 'Quantity',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                // {
                //     field: 'unit',
                //     title: 'Unit',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.uuid + '" ' +
                                'data-unit_id="' + t.uuid+ '">' +
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
            columns: [
                {
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                    width: 150
                },
                // {
                //     field: 'quantity',
                //     title: 'Quantity',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                // {
                //     field: 'unit',
                //     title: 'Unit',
                //     sortable: 'asc',
                //     filterable: !1,
                //     width: 150,
                //     template: function (t) {
                //         return t.name + ' (' + t.symbol + ')'
                //     }
                // },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    width: 50,
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" ' +
                                'data-item_id="' + t.uuid + '" ' +
                                'data-unit_id="' + t.uuid+ '">' +
                                    '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
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


        // $('#item_taskcard').on('click', function () {
        //     $('.btn-success').removeClass('reset');
        // });
        $('.footer').on('click', '.edit-taskcard', function () {

            taskcard_reset();
            let title = $('input[name=title]').val();
            let number = $('input[name=number]').val();
            let description = $('#description').val();
            let threshold_amount = $('input[name=threshold_amount]').val();
            let repeat_amount = $('input[name=repeat_amount]').val();
            let source = $('input[name=source]').val();
            let effectifity = $('input[name=effectifity]').val();
            let otr_certification = $('#otr_certification').val();
            let threshold_type = $('#threshold_type').val();
            let repeat_type = $('#repeat_type').val();
            let taskcard = $('#taskcard').val();
            let zone = $('input[name=zone]').val();
            let access = $('input[name=access]').val();
            let applicability_airplane = $('input[name=applicability_airplane]').val();
            let applicability_engine = $('#applicability_engine').val();
            let work_area = $('#work_area').val();
            let relationship = $('#relationship').val();

            if ($('#aircraft_taskcard :selected').length > 0) {
                var aircraft_taskcards = [];

                $('#aircraft_taskcard :selected').each(function (i, selected) {
                    aircraft_taskcards[i] = $(selected).val();
                });
            }


            if (document.getElementById("is_applicability_engine_all").checked) {
                is_applicability_engine_all = 1;
            } else {
                is_applicability_engine_all = 0;
            }

            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }
            // $.ajax({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     type: 'PUT',
            //     url: '/item/' + uuid + '/',
            //     data: {
            //         _token: $('input[name=_token]').val(),
            //         code: code,
            //         name: name,
            //         description: description,
            //         unit_id: unit_id,
            //         category: category,
            //         is_stock: is_stock,
            //         is_ppn: is_ppn,
            //         ppn_amount: ppn_amount,
            //         account_code: account_code,
            //         selectedtags: selectedtags,
            //     },
            //     success: function (data) {
            //         if (data.errors) {
            //             if (data.errors.title) {
            //                 $('#title-error').html(data.errors.title[0]);
            //             }

            //             if (data.errors.number) {
            //                 $('#number-error').html(data.errors.number[0]);
            //             }

            //             if (data.errors.taskcard) {
            //                 $('#taskcard-error').html(data.errors.taskcard[0]);
            //             }

            //             if (data.errors.otr_certification) {
            //                 $('#otr-certification-error').html(data.errors.otr_certification[0]);
            //             }

            //             if (data.errors.threshold_type) {
            //                 $('#threshold-type-error').html(data.errors.threshold_type[0]);
            //             }

            //             if (data.errors.threshold_amount) {
            //                 $('#threshold-amount-error').html(data.errors.threshold_amount[0]);
            //             }

            //             if (data.errors.repeat_type) {
            //                 $('#repeat-type-error').html(data.errors.repeat_type[0]);
            //             }

            //             if (data.errors.repeat_amount) {
            //                 $('#repeat-amount-error').html(data.errors.repeat_amount[0]);
            //             }

            //             if (data.errors.zone) {
            //                 $('#zone-error').html(data.errors.zone[0]);
            //             }

            //             if (data.errors.access) {
            //                 $('#access-error').html(data.errors.access[0]);
            //             }

            //             if (data.errors.applicability_airplane) {
            //                 $('#applicability-airplane-error').html(data.errors.applicability_airplane[0]);
            //             }

            //             if (data.errors.applicability_engine) {
            //                 $('#applicability-engine-error').html(data.errors.applicability_engine[0]);
            //             }

            //             if (data.errors.work_area) {
            //                 $('#work-area-error').html(data.errors.work_area[0]);
            //             }

            //             document.getElementById('title').value = title;
            //             document.getElementById('number').value = number;
            //             document.getElementById('threshold_amount').value = threshold_amount;
            //             document.getElementById('repeat_amount').value = repeat_amount;
            //             document.getElementById('source').value = source;
            //             document.getElementById('effectifity').value = effectifity;
            //             document.getElementById('zone').value = zone;
            //             document.getElementById('access').value = access;
            //             document.getElementById('applicability_airplane').value = applicability_airplane;
            //             document.getElementById('description').value = description;



        //             } else {
                        taskcard_reset();

                        toastr.success('Taskcard has been updated.', 'Success', {
                            timeOut: 5000
                        });
        //             }
        //         }
        //     });
        });


    }
};

jQuery(document).ready(function () {
    Item.init();
});
