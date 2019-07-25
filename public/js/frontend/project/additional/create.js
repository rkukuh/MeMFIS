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
            !(function() {
              (t.extensions = { checkbox: {} }),
                (t.search = { input: $("#generalSearch1") });
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
                    additional_materials_get_datatable(uuids);
                    additional_tools_get_datatable(uuids);
                  });
            })();


            var datatable = $('.defect_card_datatable').mDatatable();

            $(document).on('click', '.deleteFn', (e) => {
                alert('tes');
            //   e.preventDefault();
            //   let selected = this.datatable.getSelectedRecords();
            });


        }
      };


})();

jQuery(document).ready(function () {
    AdditionalTaskCreate.init();
});
