let DcProjectShow = {
  init: function () {
      $('.test_datatable').mDatatable({
          data: {
              type: 'remote',
              source: {
                  read: {
                      method: 'GET',
                      url: '/datatables/customer',
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
                      return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                  }
              },
              {
                  field: 'name',
                  title: 'Name',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'Term of Payment',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'Actions',
                  sortable: !1,
                  overflow: 'visible',
                  template: function (t, e, i) {
                      return (
                          '<a href="/customer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                              '<i class="la la-pencil"></i>' +
                          '</a>' +
                          '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                          t.uuid +
                          ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                      );
                  }
              }
          ]
      });

      $('.test2_datatable').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    method: 'GET',
                    url: '/datatables/customer',
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
                    return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                }
            },
            {
                field: 'name',
                title: 'Name',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'payment_term',
                title: 'Term of Payment',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    return t.payment_term+" Hari"
                }
            },
            {
                field: 'Actions',
                sortable: !1,
                overflow: 'visible',
                template: function (t, e, i) {
                    return (
                        '<a href="/customer/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                            '<i class="la la-pencil"></i>' +
                        '</a>' +
                        '\t\t\t\t\t\t\t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" href="#" data-id=' +
                        t.uuid +
                        ' title="Delete"><i class="la la-trash"></i></a>\t\t\t\t\t\t\t'
                    );
                }
            }
        ]
    });


  }
};

jQuery(document).ready(function () {
  DcProjectShow.init();
});
