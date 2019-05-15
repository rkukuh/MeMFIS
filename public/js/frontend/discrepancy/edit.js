
let Discrepancy = {
    init: function () {
        let simpan = $('.footer').on('click', '.add-discrepancy', function () {

            let date = $('input[name=date]').val();
            let applicability_airplane =  $('input[name=applicability_airplane]').val();
            let discrepancy_form = $('#discrepancy_form').val();
            let aircraft_register = $('#aircraft_register').val();
            let jc_no = $('#jc_no').val();
            let aircraft_serial_number = $('#aircraft_serial_number').val();
            let sequence = $('#sequence').val();
            let engineer_quantity = $('#engineer_quantity').val();
            let mechanic_quantity = $('#mechanic_quantity').val();
            let otr_certification = $('#otr_certification').val();
            let zone = $('#zone').val();
            let ATA = $('#ATA').val();
            let manhour = $('#manhour').val();
            let remark = $('#remark').val();
            let is_rii;
            if (document.getElementById("is_rii").checked) {
                is_rii = 1;
            } else {
                is_rii = 0;
            }

            let propose = [];
            $.each($("input[name='Propose[]']:checked"), function() {
                propose.push($(this).val());
              });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/discrepancy',
                data: {
                    _token: $('input[name=_token]').val(),
                    date: date,
                    applicability_airplane: applicability_airplane,
                    discrepancy_form: discrepancy_form,
                    aircraft_register: aircraft_register,
                    jc_no: jc_no,
                    aircraft_serial_number: aircraft_serial_number,
                    sequence: sequence,
                    engineer_quantity: engineer_quantity,
                    mechanic_quantity: mechanic_quantity,
                    otr_certification: otr_certification,
                    zone: zone,
                    ATA: ATA,
                    manhour: manhour,
                    remark: remark,
                    complaint: complaint,
                    propose: propose,
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

                        toastr.success('Data berhasil disimpan.', 'Sukses', {
                            timeOut: 5000
                        });

                        // window.location.href = '/discrepancy/' + data.uuid + '/edit';

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
