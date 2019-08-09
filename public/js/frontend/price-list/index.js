let Unit = {
    init: function () {
        $('.price_list_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/price-list',
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
                    title: 'P/N',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="" class="show-price" data-toggle="modal" data-target="#modal_price_list_show"'+
                        'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                        t.uuid +
                        '>' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Item',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit.name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_price_list_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price" title="Edit"'+
                            'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t' +
                            '<button data-toggle="modal" data-target="#modal_price_list" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill add-price" title="Edit"' +
                            'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-plus-circle"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });



        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let simpan = $('.modal-footer').on('click', '.add-price', function () {
            let price_array = [];
            $('#price ').each(function (i) {
                price_array[i] = $(this).val();
            });
            let level_array = [];
            $('#level ').each(function (i) {
                level_array[i] = $(this).val();
            });

            let item = $('#uuid').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/item/'+item+'/prices',
                data: {
                    _token: $('input[name=_token]').val(),
                    price: price_array,
                    level: level_array,
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        // }
                    } else {
                        $('#modal_price_list').modal('hide');

                        toastr.success('Price List has been created.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.price_list_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        // show add price modal
         $('.price_list_datatable').on('click', '.add-price', function () {
            let item = $(this).data('uuid');

            document.getElementById("uuid").value = $(this).data('uuid');
            document.getElementById("pn").innerHTML = $(this).data('pn');
            document.getElementById("name").innerHTML = $(this).data('name');
            document.getElementById("unit").innerHTML = $(this).data('unit');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/'+item+'/prices/'+item+'/edit',
                success: function (data) {
                    $(".unit_price_list").empty();
                    for (let i = 0; i < data.length; i++) {
                        $('#price_'+i).val(data[i].amount);
                        $('#level_'+i+" option[value="+data[i].level+"]").prop('selected', true);   
                    }

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });
        let edit = $('.price_list_datatable').on('click', '.edit-price', function edit () {
            save_changes_button();

            let item = $(this).data('uuid');
            document.getElementById("pn-edit").innerHTML = $(this).data('pn');
            document.getElementById("name-edit").innerHTML = $(this).data('name');
            document.getElementById("unit-edit").innerHTML = $(this).data('unit');
            

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/'+item+'/prices/'+item+'/edit',
                success: function (data) {
                    $(".unit_price_list").empty();
                    for (let i = 0; i < data.length; i++) {
                        $(".unit_price_list").append(
                        '<div class="row" style="margin-bottom:15px">'+
                            '<div class="col-sm-6 col-md-6 col-lg-6" style="padding:15px; background-color:beige; margin-right:15px;  margin-left:15px;">'+
                                data[i].amount+
                            '</div>'+
                            '<div class="col-sm-4 col-md-4 col-lg-4" style="padding:15px; background-color:beige">'+
                                data[i].level+
                            '</div>'+
                        '</div>'
                        );
                    }

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        let show = $('.price_list_datatable').on('click', '.show-price', function edit () {

            let item = $(this).data('uuid');
            document.getElementById("pn-show").innerHTML = $(this).data('pn');
            document.getElementById("name-show").innerHTML = $(this).data('name');
            document.getElementById("unit-show").innerHTML = $(this).data('unit');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/'+item+'/prices/'+item+'/edit',
                success: function (data) {
                    $('#price-list').empty();

                    for (let i = 0; i < data.length; i++) {
                        $('#price-list-show').append(
                            //                     '<option value="' + key + '" selected>' + value + '</option>'
                            '<tr>'+
                            '<td>Unit Price '+(i+1)+'</td>'+
                            '<td>'+
                            '<div id="unit-edit" name="unit" style="background-color: beige;'+
                            'padding: 15px;" >'+
                                data[i].amount+
                            '</div>'+
                            '</td>'+
                            '</tr>'
                        );
                    }

                    $('.btn-success').addClass('update');
                    $('.btn-success').removeClass('add');
                },
                error: function (jqXhr, json, errorThrown) {
                    // this are default for ajax errors
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;

                    $.each(errors.errors, function (index, value) {
                        $('#kategori-error').html(value);
                    });
                }
            });
        });

        let update = $('.modal-footer').on('click', '.update', function () {
            let name = $('input[name=name]').val();
            let symbol = $('input[name=symbol]').val();
            let type_id =$('#type_id').val();
            let triggerid = $('input[name=uuid]').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'put',
                url: '/unit/' + triggerid,
                data: {
                    _token: $('input[name=_token]').val(),
                    name: name,
                    symbol: symbol,
                    type_id: type_id
                },
                success: function (data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);

                        }
                        if (data.errors.symbol) {
                            $('#symbol-error').html(data.errors.symbol[0]);

                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);

                        }

                    } else {
                        save_changes_button();
                        $('#modal_unit').modal('hide');

                        toastr.success('Unit has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.unit_datatable').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        let close = $('.modal-footer').on('click', '.clse', function () {
            save_button();
        });

        $('.unit_datatable').on('click', '.delete', function () {
            let unit_uuid = $(this).data('uuid');

            swal({
                title: 'Sure want to remove?',
                type: 'question',
                confirmButtonText: 'Yes, REMOVE',
                confirmButtonColor: '#d33',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
            })
            .then(result => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content'
                            )
                        },
                        type: 'DELETE',
                        url: '/unit/' + unit_uuid + '',
                        success: function (data) {
                            toastr.success('Unit has been deleted.', 'Deleted', {
                                    timeOut: 5000
                                }
                            );

                            let table = $('.unit_datatable').mDatatable();

                            table.originalDataSet = [];
                            table.reload();
                        },
                        error: function (jqXhr, json, errorThrown) {
                            let errors = jqXhr.responseJSON;

                            $.each(errors.errors, function (index, value) {
                                $('#delete-error').html(value);
                            });
                        }
                    });
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    Unit.init();
});
