let AdditionalTaskCreate = (function() {
    let t ={
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_parent_uuid,
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
                serverSorting: !1
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
                field: "RecordID",
                title: "#",
                sortable: !1,
                width: 40,
                textAlign: "center",
                selector: { class: "m-checkbox--solid m-checkbox--brand" }
                },
                {
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'defectcard_skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
    };

    let t2 ={

            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid+'/selected',
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
                serverSorting: !1
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
                field: "RecordID",
                title: "#",
                sortable: !1,
                width: 40,
                textAlign: "center",
                selector: { class: "m-checkbox--solid m-checkbox--brand" }
                },
                {
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'code',
                    title: 'Defect Card No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'JC Ref.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.jobcardable.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'defectcard_skill',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'estimation_manhour',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'created_by',
                    title: 'Created By',
                    sortable: 'asc',
                    filterable: !1,
                }
            ]
    };

    return {

        init: function() {
            $('.materials_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/project/additional/'+project_uuid+'/materials',
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
                columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                }
                ]
            });
            $('.tools_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/project/additional/'+project_uuid+'/tools',
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
                columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Tool Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.unit_id',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'description',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                }
                ]
            });

            let UUID_Selected = "";

            !(function() {
              (t2.extensions = { checkbox: {} }),
                (t2.search = { input: $("#generalSearch1") });
              let additional_material_datatables_init = true;
              let e = $("#defect_card_datatable_actual").mDatatable(t2);
              $("#m_form_status1").on("change", function() {
                e.search(
                  $(this)
                    .val()
                    .toLowerCase(),
                  "Status"
                );
              }),
                $("#m_form_type1").on("change", function() {
                  e.search(
                    $(this)
                      .val()
                      .toLowerCase(),
                    "Type"
                  );
                }),
                $("#m_form_status1,#m_form_type1").selectpicker(),
                e.on(
                  "m-datatable--on-click-checkbox m-datatable--on-layout-updated",
                  function(t2) {
                    let uuids = e.checkbox().getSelectedId();

                    UUID_Selected = uuids

                    // let a = e.checkbox().getSelectedId().length;
                    // $("#m_datatable_selected_number1").html(a),
                    //   a > 0
                    //     ? $("#m_datatable_group_action_form1").collapse("show")
                    //     : $("#m_datatable_group_action_form1").collapse("hide");
                  }
                ),
                $(".nav-tabs")
                  .on("click", ".mat-tool", function() {
                    let uuids = e.checkbox().getSelectedId();

                    additional_tools_get_datatable(uuids);

                    additional_materials_get_datatable(uuids);
                  });
            })();


            UUID = "";

            !(function() {
              (t.extensions = { checkbox: {} }),
                (t.search = { input: $("#generalSearch1") });
              let additional_material_datatables_init = true;
              let e = $("#defect_card_datatable").mDatatable(t);
              $("#m_form_status1").on("change", function() {
                e.search(
                  $(this)
                    .val()
                    .toLowerCase(),
                  "Status"
                );
              }),
                $("#m_form_type1").on("change", function() {
                  e.search(
                    $(this)
                      .val()
                      .toLowerCase(),
                    "Type"
                  );
                }),
                $("#m_form_status1,#m_form_type1").selectpicker(),
                e.on(
                  "m-datatable--on-click-checkbox m-datatable--on-layout-updated",
                  function(t) {
                    let uuids = e.checkbox().getSelectedId();

                    UUID = uuids

                    // let a = e.checkbox().getSelectedId().length;
                    // $("#m_datatable_selected_number1").html(a),
                    //   a > 0
                    //     ? $("#m_datatable_group_action_form1").collapse("show")
                    //     : $("#m_datatable_group_action_form1").collapse("hide");
                  }
                ),
                $(".nav-tabs")
                  .on("click", ".mat-tool", function() {
                    let uuids = e.checkbox().getSelectedId();

                    additional_tools_get_datatable(uuids);

                    additional_materials_get_datatable(uuids);
                  });
            })();


            var datatable = $('.defect_card_datatable').mDatatable();

            $(document).on('click', '.deleteFn', (e) => {
            //   e.preventDefault();
            //   let selected = this.datatable.getSelectedRecords();
            });

            $('.add-project-additional').on('click', function () {
                let data = new FormData();
                data.append("defectcard_uuid", UUID);
                data.append('_method', 'PUT');


                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/project-hm-additional/'+project_uuid,
                    processData: false,
                    contentType: false,
                    cache: false,
                    data:data,
                    success: function (data) {
                        if (data.errors) {

                        } else {
                            toastr.success('Defectcard has been created.', 'Success', {
                                timeOut: 5000
                            });

                            let table = $('#defect_card_datatable_actual').mDatatable();

                            table.originalDataSet = [];
                            table.reload();

                            let table2 = $('#defect_card_datatable').mDatatable();

                            table2.originalDataSet = [];
                            table2.reload();

                        }
                    }
                });
            });
            $('.delete-project-additional').on('click', function () {
                let data = new FormData();
                data.append("defectcard_uuid", UUID_Selected);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    url: '/project-hm-additional/'+project_uuid+'/destroy',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data:data,
                    success: function (data) {
                        if (data.errors) {

                        } else {
                            toastr.success('Defectcard Aditional has been deleted.', 'Success', {
                                timeOut: 5000
                            });

                            let table = $('#defect_card_datatable_actual').mDatatable();

                            table.originalDataSet = [];
                            table.reload();

                            let table2 = $('#defect_card_datatable').mDatatable();

                            table2.originalDataSet = [];
                            table2.reload();

                        }
                    }
                });
            });


        }
      };


})();

jQuery(document).ready(function () {
    AdditionalTaskCreate.init();
});

$('.footer-additional').on('click', '.update-additional-data', function () {

    let total_manhours = $("#estimation_manhour").attr('value');
    let performance_factor = $("#performance_factor").val();
    let total_manhours_with_performance_factor = total_manhours * performance_factor;
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/project-hm-additional/'+project_uuid+'/additional-store',
        data:{
            total_manhours: total_manhours,
            performance_factor: performance_factor,
            total_manhours_with_performance_factor:total_manhours_with_performance_factor,
        },
        success: function (data) {
            if (data.errors) {
                // if (data.errors.customer_id) {
                //     $('#customer-error').html(data.errors.customer_id[0]);
                // }

                // document.getElementById('customer').value = data.getAll('customer_id');

            } else {
                toastr.success('Project Additional has been Updated.', 'Success', {
                    timeOut: 5000
                });
                
                // window.location.href = '/project-hm/'+data.uuid+'/edit';

            }
        }
    });
});