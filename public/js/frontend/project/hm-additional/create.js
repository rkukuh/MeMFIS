let AdditionalTaskCreate = (function() {
    let t ={
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid,
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
                    field: 'tc_number',
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
                            url: '/datatables/project/additional/initial',
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
                columns: [{
                    field: 'code',
                    title: 'P/N',
                    sortable: !1,
                },
                {
                    field: 'name',
                    title: 'Name',
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
                    field: 'unit.name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.note',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
                ]
            });
            $('.tools_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/project/additional/initial',
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
                    field: 'pivot.quantity',
                    title: 'Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit.name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'pivot.note',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: 'Actions',
                //     sortable: !1,
                //     overflow: 'visible',
                //     template: function (t, e, i) {
                //         return (
                //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                //                 '<i class="la la-trash"></i>' +
                //             '</a>'
                //         );
                //     }
                // }
                ]
            });

            let UUID = "";

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
                mApp.block(".add-project-additional");

                let data = new FormData();
                data.append("defectcard_uuid", UUID);
                data.append("title", $("#additional_project_title").val());
                data.append("performance_factor", $("#performance_factor").val());
                data.append("estimation_manhour", $("#estimation_manhour").attr('value'));
                data.append("total_manhour_with_performance_factor", $("#total_manhour").attr('value'));

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
                        mApp.unblock(".add-project-additional");

                        if (data.errors) {

                        } else {

                            toastr.success('Project Aditional has been created.', 'Success', {
                                timeOut: 5000
                            });
                            window.location.href = '/project-hm-additional/'+data.uuid+'/edit';

                        }
                    }
                });
            });


        }
      };


})();

jQuery(document).ready(function () {
    AdditionalTaskCreate.init();
    $("#defect_card_datatable").on("click", "tr", function(e){
        let numberFormat = new Intl.NumberFormat('id', { maximumSignificantDigits: 3, maximumFractionDigits: 2, minimumFractionDigits: 2});
        let performance_factor = $("#performance_factor").val();
        let defect_card_datatable = $('#defect_card_datatable').mDatatable();
        let uuids = defect_card_datatable.checkbox().getSelectedId();
        let data = new FormData();
        data.append("uuids", JSON.stringify(uuids) );
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: '/project-hm-additional/calculateManhours',
            processData: false,
            contentType: false,
            cache: false,
            data:data,
            success: function (data) {
                $('#estimation_manhour').html(data);
                $('#estimation_manhour').attr('value', data);
                $('#total_manhour').html(numberFormat.format(data * performance_factor));
                $('#total_manhour').attr('value', data * performance_factor);
            }
        });
    });
});
