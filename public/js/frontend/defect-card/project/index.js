let DcProject = {
  init: function () {
      $('.defectcard_datatable').mDatatable({
          data: {
              type: 'remote',
              source: {
                  read: {
                      method: 'GET',
                      url: '/datatables/defectcard/project',
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
                  field: 'created_at',
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
                      return '<a href="/project-hm/'+t.jobcard.quotation.project.uuid+'">' + t.jobcard.quotation.project.code + "</a>"
                  }
              },
              {
                  field: 'jobcard.quotation.project.no_wo',
                  title: 'Work Order No',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'jobcard.quotation.project.title',
                  title: 'Project Title',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'jobcard.quotation.project.customer.name',
                  title: 'Customer',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'jobcard.quotation.project.aircraft.name',
                  title: 'A/C Type',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'jobcard.quotation.project.aircraft_register',
                  title: 'A/C Reg',
                  sortable: 'asc',
                  filterable: !1,
              },
              {
                  field: 'jobcard.quotation.project.aircraft_sn',
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
                          '<a href="defectcard-project/'+t.jobcard.quotation.project.uuid+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
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
