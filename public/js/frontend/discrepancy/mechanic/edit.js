
let Discrepancy = {
    init: function () {
        $(document).ready(function () {
            document.getElementById('other').onchange = function () {
                if (document.getElementById("other").checked) {
                    $('#other_text').prop("disabled", false);
                } else {
                    document.getElementById('other_text').value = null;
                    $('#other_text').prop("disabled", true);
                }
            };
        });
        let simpan = $('.footer').on('click', '.edit-discrepancy', function () {
            let uuid = $('input[name=uuid]').val();
            let engineer_qty = $('input[name=engineer_qty]').val();
            let helper_quantity =  $('input[name=helper_quantity]').val();
            let jobcard_id =  $('input[name=jobcard_id]').val();
            let manhours =  $('input[name=manhours]').val();
            let description = $('#description').val();
            let complaint = $('#complaint').val();
            let other = $('#other_text').val();

            let is_rii;
            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }
            let propose = [];
            $.each($("input[name='propose[]']:checked"), function() {
                propose.push($(this).val());
              });
            // console.log(propose);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'PUT',
                url: '/discrepancy-mechanic/'+uuid+'/',
                data: {
                    _token: $('input[name=_token]').val(),
                    jobcard_id: jobcard_id,
                    engineer_quantity: engineer_qty,
                    helper_quantity: helper_quantity,
                    estimation_manhour: manhours,
                    description: description,
                    complaint: complaint,
                    propose: propose,
                    propose_correction_text: other,
                    is_rii:is_rii,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        // }
                        // if (data.errors.payment_term) {
                        //     $('#payment_term-error').html(data.errors.payment_term[0]);
                        // }
                        // document.getElementById('name').value = name;
                        // document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Discrepancy has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy-engineer/' + data.uuid + '/edit';

                    }
                }
            });
        });
    }
};
let Item = {
    init: function() {
        $(".tools_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        method: "GET",
                        url: "/datatables/tool",

                        map: function(raw) {
                            let dataSet = raw;

                            if (typeof raw.data !== "undefined") {
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
                theme: "default",
                class: "",
                scroll: false,
                footer: !1
            },
            sortable: !0,
            filterable: !1,
            pagination: !0,
            search: {
                input: $("#generalSearch")
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
                    field: "code",
                    title: "Part No.",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return (
                            '<a href="/item/' + t.uuid + '">' + t.code + "</a>"
                        );
                    }
                },
                {
                    field: "name",
                    title: "Material Name",
                    sortable: "asc",
                    filterable: !1
                },
                {
                    field: "unit",
                    title: "Unit",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return t.unit.name + " (" + t.unit.symbol + ")";
                    }
                },
                {
                    field: "caterory",
                    title: "Category",
                    sortable: "asc",
                    filterable: !1,
                    template: function(t) {
                        return t.categories[0].name;
                    }
                }
            ]
        });
    }
};

jQuery(document).ready(function() {
    Item.init();
    Discrepancy.init();
});
