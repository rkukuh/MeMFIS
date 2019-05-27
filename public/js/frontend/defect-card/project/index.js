let DcProject = {
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
                  field: 'date',
                  title: 'Date',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'code',
                  title: 'Project No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                  }
              },
              {
                  field: 'code',
                  title: 'Work Order No',
                  sortable: 'asc',
                  filterable: !1,
                  template: function (t) {
                      return '<a href="/customer/'+t.uuid+'">' + t.code + "</a>"
                  }
              },
              {
                  field: 'name',
                  title: 'Project Title',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'name',
                  title: 'Customer',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'A/C Type',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'A/C Reg',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'A/C Serial No',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'payment_term',
                  title: 'Created By',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'Actions',
                  sortable: !1,
                  overflow: 'visible',
                  template: function (t, e, i) {
                      return (
                          '<a href="defectcard-project/1" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                              '<i class="la la-pencil"></i>' +
                          '</a>'
                      );
                  }
              }
          ]
      });

  }
};

jQuery(document).ready(function () {
  DcProject.init();
});
