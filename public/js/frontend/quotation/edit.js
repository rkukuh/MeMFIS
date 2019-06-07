

let Quotation = {
    init: function () {
        let exchange_rate_value = $('input[name=exchange]').val();
        $(document).ready(function () {
            let GTotal = IDRformatter.format(document.getElementById("grand_total").innerHTML);
            document.getElementById("grand_total").innerHTML = GTotal;
        });

        $('select[name="currency"]').on('change', function () {
            let exchange_id = this.options[this.selectedIndex].innerHTML;
            let exchange_rate = $('input[name=exchange]');
            if (exchange_id === "Rupiah (Rp)") {
                exchange_rate.val(1);
                exchange_rate.attr("readonly", true);
            } else {
                exchange_rate.val('');
                exchange_rate.attr("readonly", false);
            }
        });

        let edit = $(".m_datatable").on("click", ".edit", function () {
            $("#button").show();
            $("#simpan").text("Perbarui");

            let triggerid = $(this).data("id");

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/category/" + triggerid + "/edit",
                success: function (data) {
                    document.getElementById("id").value = data.id;
                    document.getElementById("name").value = data.name;

                    $(".btn-success").addClass("update");
                    $(".btn-success").removeClass("add");
                },
                error: function (jqXhr, json, errorThrown) {
                    let errorsHtml = "";
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $("#kategori-error").html(value);
                    });
                }
            });
        });

        let workpackage_datatables_init = true;
        $(document).ready(function () {
            $.ajax({
                url: '/project/' + project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (workpackage_datatables_init == true) {
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else {
                        let table = $('.workpackage_datatable').mDatatable();
                        table.destroy();
                        workpackage(data.uuid);
                        table = $('.workpackage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

            let customer_uuid = $('#customer_id')[0].value;
            let phone = $('#phone');
            let fax = $('#fax');
            let addresses = $('#address');
            let emails = $('#email');
            // emptying options
            phone.empty();
            fax.empty();
            addresses.empty();
            emails.empty();
            let phoneNumber = "";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/label/get-customer/' + customer_uuid,
                type: 'GET',
                dataType: "json",
                success: function (respone) {
                    if (respone) {
                        let res = JSON.parse(respone);
                        $('select[name="attention"]').empty();
                        $('select[name="phone"]').empty();
                        $('select[name="email"]').empty();
                        $('select[name="fax"]').empty();
                        $('select[name="address"]').empty();
                        for (var i = 0; i < res.length; i++) {
                            if (res[i].name) {
                                $('select[name="attention"]').append(
                                    '<option value="' + res[i].name + '">' + res[i].name + '</option>'
                                );
                            }
                            if (res[i].address) {
                                $('select[name="attention"]').append(
                                    '<option value="' + res[i].address + '">' + res[i].address + '</option>'
                                );
                            }
                            if (res[i].fax) {
                                $('select[name="attention"]').append(
                                    '<option value="' + res[i].fax + '">' + res[i].fax + '</option>'
                                );
                            }
                            if (res[i].phones) {
                                $.each(res[i].phones, function (value) {
                                    $('select[name="phone"]').append(
                                        '<option value="' + res[i].phones[value] + '">' + res[i].phones[value] + '</option>'
                                    );
                                });
                            }
                            if (res[i].emails) {
                                $.each(res[i].emails, function (value) {
                                    $('select[name="email"]').append(
                                        '<option value="' + res[i].emails[value] + '">' + res[i].emails[value] + '</option>'
                                    );
                                });
                            }
                        }
                    } else {
                        console.log("empty");

                    }

                }
            });
        });

        $('.summary_datatable').on('click', '.discount', function edit() {
            document.getElementById("workpackage_uuid").value = $(this).data('uuid');
        });

        $('.calculate').on('click', function edit() {
            var nilai = [];
            var inputs = $(".charge");
            //get all values
            for (var i = 0; i < inputs.length; i++) {
                nilai[i] = parseInt($(inputs[i]).val());
            }
            //sum semua nilai pada array
            const arrSum = arr => arr.reduce((a, b) => a + b, 0);
            let subTotal = $('#sub_total').attr("value");
            let grandTotal = parseInt(subTotal) + parseInt(arrSum(nilai));
            $('#grand_total').attr("value", grandTotal);
            $('#grand_total').html(IDRformatter.format(grandTotal));
        });

        $('.action-buttons').on('click', '.discount', function () {
            let type = $('#discount-type').val();
            let discount = $('input[name=discount]').val();
            let quotation = $('#quotation_uuid').val();
            let workpackage = $('#workpackage_uuid').val();


            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/quotation/' + quotation + '/workpackage/' + workpackage + '/discount',
                data: {
                    _token: $('input[name=_token]').val(),
                    discount_type: type,
                    discount_value: discount,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        //     document.getElementById('name').value = name;
                        // }
                    } else {
                        $('#discount').modal('hide');


                        toastr.success('Discount has been updated.', 'Success', {
                            timeOut: 5000
                        });


                        let table = $('.summary_datatable').mDatatable();


                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        $('.nav-tabs').on('click', '.workpackage', function () {
            let workpackage = $('.workpackage_datatable').mDatatable();

            workpackage.originalDataSet = [];
            workpackage.reload();
        });

        $('.nav-tabs').on('click', '.summary', function () {

            let summary = $('.summary_datatable').mDatatable();

            summary.originalDataSet = [];
            summary.reload();

        });

        $('select[name="work-order"]').on('change', function () {
            let project_id = this.options[this.selectedIndex].value;
            $.ajax({
                url: '/project/' + project_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#project_number').html(data.title);
                    $('#name').html(data.customer.name);
                    $('#customer_id').val(data.customer.uuid);

                    if (workpackage_datatables_init == true) {
                        workpackage_datatables_init = false;
                        workpackage(data.uuid);
                    }
                    else {
                        let table = $('.workpackage_datatable').mDatatable();
                        table.destroy();
                        workpackage(data.uuid);
                        table = $('.workpackage_datatable').mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });

            let customer_uuid = $('#customer_id')[0].value;
            let phone = $('#phone');
            let fax = $('#fax');
            let addresses = $('#address');
            let emails = $('#email');
            // emptying options
            phone.empty();
            fax.empty();
            addresses.empty();
            emails.empty();
            let phoneNumber = "";
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'GET',
                dataType: "json",
                url: '/label/get-customer/' + customer_uuid,
                success: function (data) {
                    // adding customer phones  option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.phones)) {
                        console.log('empty phones');
                    } else {
                        console.log('get the phones data');
                        $.each(data.phones, function (key, value) {
                            if (value.ext === null) {
                                phoneNumber = value.number;
                            } else {
                                phoneNumber = value.number + ' Ext. ' + value.ext;
                            }
                            let phoneNumberOption = new Option(phoneNumber, value.uuid);
                            phone.append(phoneNumberOption);
                        });
                    }

                    // adding customer faxes  option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.faxes)) {
                        console.log('empty faxes');
                    } else {
                        console.log('get the faxes data');
                        $.each(data.faxes, function (key, value) {
                            let faxNumberOption = new Option(value.number, value.uuid);
                            fax.append(faxNumberOption);
                        });
                    }

                    // Adding customer addresses option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.addresses)) {
                        console.log('empty addresses');
                    } else {
                        console.log('get the addresses data');
                        $.each(data.addresses, function (key, value) {
                            let addressesOption = new Option(value.address, value.uuid);
                            addresses.append(addressesOption);
                        });
                    }

                    // Adding customer emails option on selectBox inside identifier
                    if (jQuery.isEmptyObject(data.emails)) {
                        console.log('empty emails');
                    } else {
                        console.log('get the emails data');
                        $.each(data.emails, function (key, value) {
                            let emailsOption = new Option(value.address, value.uuid);
                            emails.append(emailsOption);
                        });
                    }
                }
            });
        });

        $('.footer').on('click', '.add-quotation', function () {
            let attention_name = $('#attention').val();
            let attention_phone = $('#phone').val();
            let attention_fax = $('#fax').val();
            let attention_email = $('#email').val();
            let attention_address = $('#address').val();
            let scheduled_payment_array = [];
            $('#scheduled_payment ').each(function (i) {
                scheduled_payment_array[i] = $(this).val();
            });
            scheduled_payment_array.pop();
            let data = new FormData();
            data.append("project_id", $('#work-order').val());
            data.append("customer_id", $('#customer_id').val());
            data.append("requested_at", $('#date').val());
            data.append("valid_until", $('#valid_until').val());
            data.append("currency_id", $('#currency').val());
            data.append("term_of_payment", $('#term_of_payment').val());
            data.append("term_of_condition", $('#term_and_condition').val());
            data.append("exchange_rate", $('#exchange').val());
            data.append("scheduled_payment_type", $('#scheduled_payment_type').val());
            data.append("scheduled_payment_amount", scheduled_payment_array);
            data.append("attention_name", attention_name);
            data.append("attention_phone", attention_phone);
            data.append("attention_fax", attention_fax);
            data.append("attention_email", attention_email);
            data.append("attention_address", attention_address);
            data.append("total", 0.000000);
            data.append("title", $('#title').val());
            data.append("description", $('#description').val());
            data.append("top_description", $('#term_and_condition').val());
            data.append("subtotal", $('#sub_total').attr("value"));
            data.append("grandtotal", $('#grand_total').attr("value"));
            data.append("title", $('#title').val());

            var charge = [];
            var chargeInputs = $(".charge");
            //get all values
            for (var i = 0; i < chargeInputs.length; i++) {
                charge[i] = parseInt($(chargeInputs[i]).val());
            }
            data.append("charge", JSON.stringify(charge));
            var chargeType = [];
            var chargeTypeInputs = $("select[name^=charge_type]");
            //get all values
            for (var i = 0; i < chargeTypeInputs.length; i++) {
                chargeType[i] = parseInt($(chargeTypeInputs[i]).val());
            }
            data.append("chargeType", JSON.stringify(chargeType));
            console.log(chargeType);
            console.log(chargeTypeInputs);
            console.log(chargeTypeInputs.length);
            data.append('_method', 'PUT');

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: 'post',
                url: '/quotation/' + quotation_uuid,
                processData: false,
                contentType: false,
                data: data,
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.currency_id) {
                            $("#currency-error").html(data.errors.currency_id[0]);
                        }
                        if (data.errors.customer_id) {
                            $("#customer_id-error").html(data.errors.customer_id[0]);
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                        }
                        if (data.errors.exchange_rate) {
                            $("#exchange-error").html(data.errors.exchange_rate[0]);
                        }
                        if (data.errors.project_id) {
                            $("#work-order-error").html(data.errors.project_id[0]);
                        }
                        if (data.errors.requested_at) {
                            $("#requested_at-error").html(data.errors.requested_at[0]);
                        }
                        if (data.errors.scheduled_payment_amount) {
                            $("#scheduled_payment_amount-error").html(data.errors.scheduled_payment_amount[0]);
                        }
                        if (data.errors.scheduled_payment_type) {
                            $("#scheduled_payment_type-error").html(data.errors.scheduled_payment_type[0]);
                        }
                        if (data.errors.valid_until) {
                            $("#valid_until-error").html(data.errors.valid_until[0]);
                        }

                        document.getElementById("name").value = name;
                    } else {

                        toastr.success('Quotation has been created.', 'Success', {
                            timeOut: 5000
                        });

                        // window.location.href = '/quotation/' + response.uuid + '/edit';

                    }
                }
            });
        });
    }
};

jQuery(document).ready(function () {
    Quotation.init();
});
