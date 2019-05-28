let DcProjectShow = {
  init: function () {
      $('.defectcard_datatable').mDatatable({
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
          columns: [
              {
                  field: 'code',
                  title: 'Date',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'code',
                  title: 'Defect card No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                  }
              },
              {
                  field: 'name',
                  title: 'JC Ref.',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'Complaint',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Complaint',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Date Finished',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Act. Mhrs',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Mech',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Eng',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Controller',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return t.payment_term+" Hari"
                  }
              },
              {
                  field: 'payment_term',
                  title: 'Status',
                  sortable: 'asc',
                  filterable: !1,
              },
          ]
      });

  }
};

jQuery(document).ready(function () {
  DcProjectShow.init();
});
