var Category = {
    init: function () {
        $(".m_datatable").mDatatable({
            data: {
                type: "remote",
                source: {
                    read: {
                        // sample GET method
                        method: "GET",
                        url: "/getjournal",
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;
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
                serverSorting: !0
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
                    field: "id",
                    title: "#",
                    sortable: !1,
                    width: 40
                },
                {
                    field: "code",
                    title: "Code",
                    sortable: "asc",
                    filterable: !1,
                    width: 60
                },
                {
                    field: "name",
                    title: "Name",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "type",
                    title: "Type",
                    sortable: "asc",
                    filterable: !1,
                    width: 150,
                },
                {
                    field: "level",
                    title: "Level",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "description",
                    title: "Description",
                    sortable: "asc",
                    filterable: !1,
                    width: 150
                },
                {
                    field: "Actions",
                    width: 110,
                    title: "Actions",
                    sortable: !1,
                    overflow: "visible",
                    template: function (t, e, i) {
                        return (
                            // '<button data-toggle="modal" data-target="#modal_customer" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill show" title="Details" data-id=' +
                            // t.id +
                            // '>\t\t\t\t\t\t\t<i class="la la-search"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '<button data-toggle="modal" data-target="#modal_journal" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id=' +
                            t.id +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '\t\t\t\t\t\t    \t<a class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill  delete" href="#" data-id=' +
                            t.id +
                            ' title="Delete"><i class="la la-trash"></i> </a>\t\t\t\t\t\t    \t'
                        );
                    }
                }
            ]
        });

        $(document).ready(function () {
            var select = document.getElementById("m_select2_1");

            $.ajax({
                url: "/type",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var angka = 1;
                    $('select[name="type"]').empty();
                    $.each(data, function (key, value) {
                        if (angka == 1) {
                            $('select[name="type"]').append(
                                "<option> Select a Type</option>"
                            );
                            angka = 0;
                        }
                        $('select[name="type"]').append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                    });
                }
            });
        });

        $(document).ready(function () {
            var select = document.getElementById("m_select2_2");

            $.ajax({
                url: "/type",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    var angka = 1;
                    $('select[name="level"]').empty();
                    $.each(data, function (key, value) {
                        if (angka == 1) {
                            $('select[name="level"]').append(
                                "<option> Select a Level</option>"
                            );
                            angka = 0;
                        }
                        $('select[name="level"]').append(
                            '<option value="' + key + '">' + value + "</option>"
                        );
                        });
                }
            });
        });

        var simpan = $(".modal-footer").on("click", ".add", function () {
            var code = $("input[name=code]").val();
            var name = $("input[name=name]").val();
            var type = $("#m_select2_1").val();
            var level = $("#m_select2_2").val();
            var description = $("#description").val();
            $("#simpan").text("Simpan");
            var registerForm = $("#CustomerForm");
            var formData = registerForm.serialize();
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "post",
                url: "/journal",
                data: {
                    _token: $("input[name=_token]").val(),
                    code: code,
                    name: name,
                    type: type,
                    level: level,
                    description: description
                },
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.code) {
                            $("#code-error").html(data.errors.code[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.name) {
                            $("#name-error").html(data.errors.name[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.type) {
                            $("#type-error").html(data.errors.type[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.level) {
                            $("#level-error").html(data.errors.level[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                    } else {
                        $("#modal_journal").modal("hide");
                        toastr.success("Berhasil Disimpan.", "Sukses!!", {
                            timeOut: 5000
                        });
                        $("#code-error").html("");
                        $("#name-error").html("");
                        $("#type-error").html("");
                        $("#level-error").html("");
                        $("#description-error").html("");
                        var table = $(".m_datatable").mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        var edit = $(".m_datatable").on("click", ".edit", function () {
            $("#button").show();
            var triggerid = $(this).data("id");
            $("#simpan").text("Perbarui");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/journal/" + triggerid + "/edit",
                success: function (data) {
                    // $.ajax({
                    //     headers: {
                    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    //     },
                    //     type: "get",
                    //     url: "/type/" + data.type + "/edit",
                    //     success: function (data2) {
                    //         alert(data2.name);
                    //     },
                    // });
                    var select = document.getElementById("m_select2_1");
                    $('select[name="type"]').append(
                        "<option value='0' selected>Edit Type</option>"
                    );
                    // $.ajax({
                    //     headers: {
                    //         "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    //     },
                    //     type: "get",
                    //     url: "/level/" + data.type + "/edit",
                    //     success: function (data) {
                    //         alert(data.name);
                    //     },
                    // });
                    var select = document.getElementById("m_select2_2");
                    $('select[name="level"]').append(
                        "<option value='0' selected> Edit Level</option>"
                    );
                    document.getElementById("code").value = data.code;
                    document.getElementById("name").value = data.name;
                    document.getElementById("description").value = data.description;
                    document.getElementById("id").value = data.id;
                    $(".btn-success").addClass("update");
                    $(".btn-success").removeClass("add");
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = "";
                    $.each(errors["errors"], function (index, value) {
                        $("#journal-error").html(value);
                    });
                }
            });
        });

        var update = $(".modal-footer").on("click", ".update", function () {
            var code = $("input[name=code]").val();
            var name = $("input[name=name]").val();
            var type = $("#m_select2_1").val();
            var level = $("#m_select2_2").val();
            var description = $("#description").val();
            $("#name-error").html("");
            $("#button").show();
            var triggerid = $("input[name=id]").val();
            $("#simpan").text("Perbarui");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "put",
                url: "/journal/" + triggerid,
                data: {
                    _token: $("input[name=_token]").val(),
                    code: code,
                    name: name,
                    type: type,
                    level: level,
                    description: description
                },
                success: function (data) {
                    console.log(data);
                    if (data.errors) {
                        if (data.errors.code) {
                            $("#code-error").html(data.errors.code[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.name) {
                            $("#name-error").html(data.errors.name[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.type) {
                            $("#type-error").html(data.errors.type[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.level) {
                            $("#level-error").html(data.errors.level[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                        if (data.errors.description) {
                            $("#description-error").html(data.errors.description[0]);
                            document.getElementById("code").value = code;
                            document.getElementById("name").value = name;
                            document.getElementById("m_select2_1").value = type;
                            document.getElementById("m_select2_2").value = level;
                            document.getElementById("description").value = description;
                        }
                    } else {
                        $("#modal_journal").modal("hide");
                        toastr.success("Berhasil Disimpan.", "Sukses!!", {
                            timeOut: 5000
                        });
                        var table = $(".m_datatable").mDatatable();
                        table.originalDataSet = [];
                        table.reload();
                        $("#code-error").html("");
                        $("#name-error").html("");
                        $("#type-error").html("");
                        $("#level-error").html("");
                        $("#description-error").html("");

                    }
                }
            });
        });

        var show = $(".m_datatable").on("click", ".show", function () {
            $("#button").hide();
            var triggerid = $(this).data("id");
            $("#simpan").text("Perbarui");
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                type: "get",
                url: "/category/" + triggerid,
                success: function (data) {
                    document.getElementById("TitleModalCustomer").innerHTML =
                        "Detail Customer #ID-" + triggerid;

                    document.getElementById("name").value = data.name;
                    document.getElementById("name").readOnly = true;
                    //   document.getElementById('id').value=data.id;
                    //   $('.btn-success').removeClass('simpan');
                    //   $('.btn-success').addClass('update');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    var errors = jqXhr.responseJSON;
                    var errorsHtml = "";
                    $.each(errors["errors"], function (index, value) {
                        $("#kategori-error").html(value);
                    });
                }
            });
        });


        var remove = $(".m_datatable").on("click", ".delete", function () {
            var triggerid = $(this).data("id");
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, keep it"
            }).then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            )
                        },
                        type: "DELETE",
                        url: "/journal/" + triggerid + "",
                        success: function (data) {
                            toastr.success(
                                "Data Berhasil Dihapus.",
                                "Sukses!!!", {
                                    timeOut: 5000
                                }
                            );
                            var table = $(".m_datatable").mDatatable();
                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            // this are default for ajax errors
                            var errors = jqXhr.responseJSON;
                            var errorsHtml = "";
                            $.each(errors["errors"], function (index, value) {
                                $("#delete-error").html(value);
                            });
                        }
                    });
                    swal(
                        "Deleted!",
                        "Your imaginary file has been deleted.",
                        "success"
                    );
                } else {
                    swal(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    );
                }
            });
        });

        $('#modal_customer').on('hidden.bs.modal', function (e) {
            $(this).find('#CustomerForm')[0].reset();
            $("#name-error").html("");

        });

    }
};


jQuery(document).ready(function () {
    Category.init();
});
