let Employee_edit_basic = {
    init: function() {
        $("#id_card_photo").attr("accept", "image/*");

        let update_basic = $(".footer").on(
            "click",
            ".edit-basic-information",
            function() {
                let code = $("input[name=code]").val();
                let code_uppercase = code.toUpperCase();
                let job_title = $('select[name="job_title"]').val();
                let dob = $('input[name="dob"]').val();
                let dob_place = $('input[name="dob_place"]').val();

                let first_name = $('input[name="first_name"]').val();
                let last_name = $('input[name="last_name"]').val();
                let card_number = $('input[name="card_number"]').val();
                let gender = $('select[name="gender"]').val();
                let nationality = $('select[name="nationality"]').val();
                let religion = $('select[name="religion"]').val();
                let marital_status = $('select[name="marital_status"]').val();
                let address_line_1 = $('input[name="address_line_1"]').val();
                let address_line_2 = $('input[name="address_line_2"]').val();
                let country = $('select[name="country"]').val();

                let city = $('input[name="city"]').val();
                let zip_code = $('input[name="zip_code"]').val();
                let home_phone = $('input[name="home_phone"]').val();
                let mobile_phone = $('input[name="mobile_phone"]').val();
                let work_phone = $('input[name="work_phone"]').val();

                let other_phone = $('input[name="other_phone"]').val();
                let primary_email = $('input[name="primary_email"]').val();
                let secondary_email = $('input[name="secondary_email"]').val();
                let joined_date = $('input[name="joined_date"]').val();
                let job_position = $('select[name="job_position"]').val();

                let employee_status = $('select[name="employee_status"]').val();
                let department = $('select[name="department"]').val();
                let indirect_supervisor = $('select[name="indirect_supervisor"]').val();
                let supervisor = $('select[name="supervisor"]').val();

                let uuid = $("input[name=employee_uuid]").val();

                formData = new FormData($('#employee_create_form')[0])
    
                formData.append('code', code_uppercase);
                formData.append('gender', gender);
                formData.append('job_title', job_title);
                if($("#document")[0].files[0]){
                formData.append('document',$("#document")[0].files[0]);
                }
                formData.append('dob', dob);
                formData.append('dob_place', dob_place);
                formData.append('first_name', first_name);
                formData.append('last_name', last_name);
                formData.append('card_number', card_number);
                formData.append('nationality', nationality);
                formData.append('religion', religion);
                formData.append('marital_status', marital_status);
                formData.append('address_line_1', address_line_1);
                formData.append('address_line_2', address_line_2);
                formData.append('country', country);
                formData.append('city', city);
                formData.append('zip', zip_code);
                formData.append('home_phone', home_phone);
                formData.append('mobile_phone', mobile_phone);
                formData.append('work_phone', work_phone);
                formData.append('other_phone', other_phone);
                formData.append('primary_email', primary_email);
                formData.append('secondary_email', secondary_email);
                formData.append('joined_date', joined_date);
                formData.append('job_position', job_position);
                formData.append('employee_status', employee_status);
                formData.append('department', department);
                formData.append('indirect_supervisor', indirect_supervisor);
                formData.append('supervisor', supervisor);

                $.ajax({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        )
                    },
                    enctype: "multipart/form-data",
                    type: "PUT",
                    url: "/employee/" + uuid,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data.errors) {
                            $.each(data.errors, function(key, value) {
                                var name = $("input[name='" + key + "']");
                                if (key.indexOf(".") != -1) {
                                    var arr = key.split(".");
                                    name = $(
                                        "input[name='" +
                                            arr[0] +
                                            "']:eq(" +
                                            arr[1] +
                                            ")"
                                    );
                                }
                                name.parent()
                                    .find(
                                        "div.form-control-feedback.text-danger"
                                    )
                                    .html(value[0]);

                                if (data.errors.dob) {
                                    $("#dob-error").html(data.errors.dob[0]);
                                } else {
                                    $("#dob-error").html("");
                                }

                                if (data.errors.gender) {
                                    $("#gender-error").html(
                                        data.errors.gender[0]
                                    );
                                } else {
                                    $("#gender-error").html("");
                                }

                                if (data.errors.marital_status) {
                                    $("#marital_status-error").html(
                                        data.errors.marital_status[0]
                                    );
                                } else {
                                    $("#marital_status-error").html("");
                                }

                                if (data.errors.religion) {
                                    $("#religion-error").html(
                                        data.errors.religion[0]
                                    );
                                } else {
                                    $("#religion-error").html("");
                                }

                                if (data.errors.mobile_phone) {
                                    $("#mobile_phone-error").html(
                                        data.errors.mobile_phone[0]
                                    );
                                } else {
                                    $("#mobile_phone-error").html("");
                                }

                                if (data.errors.joined_date) {
                                    $("#joined_date-error").html(
                                        data.errors.joined_date[0]
                                    );
                                } else {
                                    $("#joined_date-error").html("");
                                }

                                if (data.errors.job_title) {
                                    $("#job_title-error").html(
                                        data.errors.job_title[0]
                                    );
                                } else {
                                    $("#job_title-error").html("");
                                }

                                if (data.errors.mobile_phone) {
                                    $("#mobile_phone-error").html(
                                        data.errors.mobile_phone[0]
                                    );
                                } else {
                                    $("#mobile_phone-error").html("");
                                }

                                if (data.errors.job_position) {
                                    $("#job_position-error").html(
                                        data.errors.job_position[0]
                                    );
                                } else {
                                    $("#job_position-error").html("");
                                }

                                if (data.errors.employee_status) {
                                    $("#employee_status-error").html(
                                        data.errors.employee_status[0]
                                    );
                                } else {
                                    $("#employee_status-error").html("");
                                }

                                if (data.errors.department) {
                                    $("#department-error").html(
                                        data.errors.department[0]
                                    );
                                } else {
                                    $("#department-error").html("");
                                }

                                if (data.errors.primary) {
                                    $("#primary-error").html(
                                        data.errors.primary[0]
                                    );
                                } else {
                                    $("#primary-error").html("");
                                }
                            });
                        } else {
                            if ($("#id_card_photo")[0].files[0]) {
                                formData = new FormData();
                                formData.append(
                                    "document",
                                    $("#id_card_photo")[0].files[0]
                                );
                                let uuid = $("input[name=employee_uuid]").val();
                                $.ajax({
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content")
                                    },
                                    url:
                                        "/employee/" + uuid + "/update-id-card",
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: formData,
                                    type: "POST",
                                    success: function(response) {
                                        if (response.errors) {
                                            alert(response.errors);
                                            location.reload();
                                        } else {
                                            toastr.success("Data has been saved.","Sukses",{timeOut: 5000});

                                            location.reload();
                                        }
                                    }
                                });
                            } else {
                                toastr.success("Data has been saved.","Sukses",{timeOut: 5000});

                                location.reload();
                            }
                        }
                    }
                });
            }
        );
    }
};

jQuery(document).ready(function() {
    Employee_edit_basic.init();
});
