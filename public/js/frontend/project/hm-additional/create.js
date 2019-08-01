let AdditionalTaskCreate = (function() {
    let t ={
    // init: function () {
        // function strtrunc(str, max, add) {
        //     add = add || '...';
        //     return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        // };

        // $('.defect_card_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project/defectcard/'+project_uuid
                        // map: function (raw) {
                        //     let dataSet = raw;

                        //     if (typeof raw.data !== 'undefined') {
                        //         dataSet = raw.data;
                        //     }

                        //     return dataSet;
                        // }
                    }
                },
                pageSize: 10,
                serverPaging: !1,
                serverSorting: !1
            },
            layout: {
                theme: 'default',
                class: '',
                scroll: false,
                footer: !1
            },
            sortable: !0,
            // filterable: !1,
            pagination: !0,
            // search: {
            //     input: $('#generalSearch')
            // },
            // toolbar: {
            //     items: {
            //         pagination: {
            //             pageSizeSelect: [5, 10, 20, 30, 50, 100]
            //         }
            //     }
            // },
            columns: [
            {
                field: "RecordID",
                title: "#",
                sortable: !1,
                width: 40,
                textAlign: "center",
                selector: { class: "m-checkbox--solid m-checkbox--brand" }
                },
                // { field: "ID", title: "ID", width: 40, template: "{{RecordID}}" },
                {
                    field: 'created_at',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    // template: function (t, e, i) {
                    //         return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                    // }
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
                    field: 'jobcard.number',
                    title: 'TC No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcard.number',
                    title: 'Mhrs Est.',
                    sortable: 'asc',
                    filterable: !1,
                    // template: function (t) {
                    //     if (t.taskcard.description) {
                    //         data = strtrunc(t.taskcard.description, 50);
                    //         return (
                    //             '<p>' + data + '</p>'
                    //         );
                    //     }

                    //     return ''
                    // }
                },
                {
                    field: 'jobcard.number',
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
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
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
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-tool" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
                ]
            });

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
                    let a = e.checkbox().getSelectedId().length;
                    $("#m_datatable_selected_number1").html(a),
                      a > 0
                        ? $("#m_datatable_group_action_form1").collapse("show")
                        : $("#m_datatable_group_action_form1").collapse("hide");
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
                alert('tes');
            //   e.preventDefault();
            //   let selected = this.datatable.getSelectedRecords();
            });

            $('.add-project-additional').on('click', function () {
                let data = new FormData();
                // data.append("title", $('#project_title').val());
                // data.append("customer_id", $('#customer').val());
                // data.append("no_wo", $('input[name=work-order]').val());
                // data.append("aircraft_id", $('#applicability_airplane').val());
                // data.append("aircraft_register", $('input[name=reg]').val());
                // data.append("aircraft_sn", $('input[name=serial-number]').val());
                // data.append("code", 'Dummy COde');
                // data.append("fileInput", document.getElementById('work-order-attachment').files[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '/project-hm-additional/'+project_uuid+'/',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data:data,
                    success: function (data) {
                        if (data.errors) {
                            // if (data.errors.customer_id) {
                            //     $('#customer-error').html(data.errors.customer_id[0]);
                            // }
                            // if (data.errors.aircraft_register) {
                            //     $('#reg-error').html(data.errors.aircraft_register[0]);
                            // }
                            // if (data.errors.aircraft_sn) {
                            //     $('#serial-number-error').html(data.errors.aircraft_sn[0]);
                            // }
                            // if (data.errors.aircraft_id) {
                            //     $('#applicability-airplane-error').html(data.errors.aircraft_id[0]);
                            // }
                            // if (data.errors.no_wo) {
                            //     $('#work-order-error').html(data.errors.no_wo[0]);
                            // }

                            // document.getElementById('customer').value = data.getAll('customer_id');
                            // document.getElementById('work-order').value = data.getAll('no_wo');
                            // document.getElementById('applicability_airplane').value = data.getAll('aircraft_id');
                            // document.getElementById('reg').value = data.getAll('aircraft_register');
                            // document.getElementById('serial-number').value = data.getAll('aircraft_sn');

                        } else {
                            toastr.success('Project Aditional has been created.', 'Success', {
                                timeOut: 5000
                            });
                            // window.location.href = '/project-hm/'+data.uuid+'/edit';

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
