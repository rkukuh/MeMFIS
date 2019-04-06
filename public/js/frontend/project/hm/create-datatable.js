var DatatableProjectHm = {
  init: function () {
      var e;
      e = $(".project-hm-datatable").mDatatable({
          data: {
              saveState: {
                  cookie: !1
              }
          },
          search: {
              input: $("#generalSearch")
          },
          columns: [
            {
              field: "Action",
          }]
      }), $("#m_form_status").on("change", function () {
          e.search($(this).val().toLowerCase(), "Status")
      }), $("#m_form_type").on("change", function () {
          e.search($(this).val().toLowerCase(), "Type")
      }), $("#m_form_status, #m_form_type").selectpicker()

      var f;
      f = $(".summary-datatable").mDatatable({
          data: {
              saveState: {
                  cookie: !1
              }
          },
          search: {
              input: $("#generalSearch")
          },
      }), $("#m_form_status").on("change", function () {
          f.search($(this).val().toLowerCase(), "Status")
      }), $("#m_form_type").on("change", function () {
          f.search($(this).val().toLowerCase(), "Type")
      }), $("#m_form_status, #m_form_type").selectpicker()
  }
};
jQuery(document).ready(function () {
  DatatableProjectHm.init()
});
