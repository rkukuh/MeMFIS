
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
        let simpan = $('.footer').on('click', '.add-discrepancy', function () {
            let zone = [];
            i = 0;
            $("#zone").val().forEach(function(entry) {
                zone[i] = entry;
                i++;
            });

            let uuid = $('input[name=uuid]').val();
            zone = JSON.stringify(zone);
            let engineer_qty = $('input[name=engineer_qty]').val();
            let helper_quantity =  $('input[name=helper_quantity]').val();
            let manhours =  $('input[name=manhours]').val();
            let description = $('#description').val();
            let ata = $('#ata').val();
            let skill_id = $('#otr_certification').val();
            let sequence = $('#sequence').val();
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

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/discrepancy-engineer',
                data: {
                    _token: $('input[name=_token]').val(),
                    jobcard_id: uuid,
                    engineer_quantity: engineer_qty,
                    helper_quantity: helper_quantity,
                    estimation_manhour: manhours,
                    description: description,
                    complaint: complaint,
                    ata: ata,
                    skill_id: skill_id,
                    sequence: sequence,
                    propose: propose,
                    propose_correction_text: other,
                    is_rii:is_rii,
                    zone:zone,
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.propose) {
                            $('#propose-error').html(data.errors.propose[0]);
                        }
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);
                        // }
                        // if (data.errors.payment_term) {
                        //     $('#payment_term-error').html(data.errors.payment_term[0]);
                        // }
                        // document.getElementById('name').value = name;
                        // document.getElementById('term_of_payment').value = payment_term;

                    } else {

                        toastr.success('Discrepancy has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/discrepancy-engineer/' + data.uuid + '/edit';

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
                serverPaging: !0,
                serverFiltering: !0,
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
