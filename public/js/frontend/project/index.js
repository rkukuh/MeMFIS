let Aircraft = {
    init: function () {
        let t;
        (t = $('.project_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/project',
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
                    title: 'Code',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/project-hm/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'title',
                    title: 'Title',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft_register',
                    title: 'AC Register',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'aircraft_sn',
                    title: 'AC SN',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'customer.name',
                    title: 'Customer',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/project-hm/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        })),
        $("#m_form_status").on("change", function() {
            t.search($(this).val(), "Status");
          }),
          $("#m_form_type").on("change", function() {
            t.search($(this).val(), "Type");
          }),
          $("#m_form_status, #m_form_type").selectpicker();
      }
    };


        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });




jQuery(document).ready(function () {
    Aircraft.init();
});
