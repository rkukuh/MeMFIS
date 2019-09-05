let Unit = {
    init: function () {
        $('.price_list_datatable-item').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/price-list-item',
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
                    title: 'Code / Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="" class="show-price" data-toggle="modal" data-target="#modal_price_list_show"'+
                        'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                        t.uuid + '>' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'unit_name',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                },
                // {
                //     field: '',
                //     title: 'Remark',
                //     sortable: 'asc',
                //     filterable: !1,
                // },
                {
                    field: 'last_update',
                    title: 'Last Update',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'updated_by',
                    title: 'Updated By',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_pricelist_item_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price-item" title="Edit"'+
                            'data-pn='+t.code+' data-name='+t.name+' data-unit='+t.unit.name+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
       
        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let simpan = $('.modal-footer').on('click', '.update-price-item', function () {
            
            let price_array = [];            
            let price_uuid_array = [];            
            let level_array = [
                1,2,3,4,5
            ];
            $('#price ').each(function() {
                price_array.push($(this).val());
            });

            $('#item_price_uuid ').each(function() {
                price_uuid_array.push($(this).val());
            });

            let item = $('#uuid-item').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'put',
                url: '/item/'+item+'/prices',
                data: {
                    _token: $('input[name=_token]').val(),
                    price: price_array,
                    level: level_array,
                    uuid: price_uuid_array
                },
                success: function (data) {
                    if (data.errors) {
                        // if (data.errors.name) {
                        //     $('#name-error').html(data.errors.name[0]);

                        // }
                    } else {
                        $('#modal_pricelist_item_edit').modal('hide');

                        toastr.success('Price List has been updated.', 'Success', {
                            timeOut: 5000
                        });

                        let table = $('.price_list_datatable-item').mDatatable();

                        table.originalDataSet = [];
                        table.reload();
                    }
                }
            });
        });

        // show add price modal
        $('.price_list_datatable-item').on('click', '.edit-price-item', function () {
            let item = $(this).data('uuid');
            document.getElementById("uuid-item").value = item;
            document.getElementById("pn").innerHTML = $(this).data('pn');
            document.getElementById("item").innerHTML = $(this).data('name');
            document.getElementById("unit_id").innerHTML = $(this).data('unit');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/item/'+item+'/prices/edit',
                success: function (data) {
                    $("#price ").each( function(i) {
                        $(this).val(data[i].amount);
                        $("input[type=hidden][name=item_price_uuid]:eq("+i+")").val(data[i].uuid);
                    });
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
    }
};

let Facility = {
    init: function () {
        $('.price_list_datatable-facility').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/price-list-facility',
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
                    title: 'Code / Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="" class="show-price" data-toggle="modal" data-target="#modal_price_list_show"'+
                        'data-pn='+t.code+' data-name='+t.name+' data-uuid=' +
                        t.uuid + '>' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Name',
                    sortable: 'asc',
                    filterable: !1,
                    
                },
                {
                    field: 'prices',
                    title: 'Price',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        let price = "";
                        t.prices.forEach(element => {
                            price += "Level : "+ element.level +" Price : US$"+ element.amount +" <br>";
                        });
                        return price;
                    }
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_pricelist_facility_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price-facility" title="Edit"'+
                            'data-name='+t.name+' data-amount= '+t.prices+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
       
        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        let updateFacility = $('.modal-footer').on('click', '.update-price-facility', function () {
            
            let price_array = [];            
            let price_uuid_array = [];            
            let level_array = [
                1,2,3,4,5
            ];
            $('#price_facility ').each(function() {
                price_array.push($(this).val());
            });

            $('#price_facility_uuid ').each(function() {
                price_uuid_array.push($(this).val());
            });

            let facility = $('#uuid-facility').val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'put',
                url: '/facility/'+facility+'/prices',
                data: {
                    _token: $('input[name=_token]').val(),
                    price: price_array,
                    level: level_array,
                    uuid: price_uuid_array
                },
                success: function (data) {
                   
                    $('#modal_pricelist_facility_edit').modal('hide');

                    toastr.success('Price List has been updated.', 'Success', {
                        timeOut: 5000
                    });

                    let table = $('.price_list_datatable-facility').mDatatable();

                    table.originalDataSet = [];
                    table.reload();
                }
            });
        });

        $('.price_list_datatable-facility').on('click', '.edit-price-facility', function () {
            let uuid = $(this).data('uuid');
            document.getElementById("uuid-facility").value = uuid;
            document.getElementById("facility").innerHTML = $(this).data('name');
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                url: '/facility/'+uuid+'/prices/edit',
                success: function (data) {
                    $("#price_facility ").each( function(i) {
                        $(this).val(data[i].amount);
                        $("input[type=hidden][name=price_facility_uuid]:eq("+i+")").val(data[i].uuid);
                    });
                }
            });
        });

    }
};

let Manhours = {
    init: function () {
        $('.price_list_datatable-manhour').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/price-list-manhour',
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
                    field: 'level',
                    title: 'Level',
                    sortable: 'asc',
                    filterable: !1,
                    
                },
                {
                    field: 'rate',
                    title: 'Rate',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'remark',
                    title: 'Remark',
                    sortable: 'asc',
                    filterable: !1
                },
                {
                    field: 'Actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_pricelist_manhour_edit" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit-price-manhour" title="Edit"'+
                            'data-level='+t.level+' data-rate='+t.rate+' data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-pencil"></i>\t\t\t\t\t\t</button>\t\t\t\t\t\t'
                        );
                    }
                }
            ]
        });
       
        $(document).ready(function () {
            $('.btn-success').removeClass('add');
        });

        $('.modal-footer').on('click', '.update-price-manhour', function () {
                let manhour = $('#uuid-manhour').val();
                let rate = $("#rate-manhour").val();
                let level = $("#level-manhour").val();
                let remark = $("#remark_manhour").val();
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'put',
                url: '/manhour/'+manhour,
                data: {
                    _token: $('input[name=_token]').val(),
                    rate: rate,
                    level: level,
                    remark: remark
                },
                success: function (data) {
                   
                    $('#modal_pricelist_manhour_edit').modal('hide');

                    toastr.success('Price List has been updated.', 'Success', {
                        timeOut: 5000
                    });

                    let table = $('.price_list_datatable-manhour').mDatatable();

                    table.originalDataSet = [];
                    table.reload();
                }
            });
        });

        $('.price_list_datatable-manhour').on('click', '.edit-price-manhour', function () {
            let uuid = $(this).data('uuid');
            document.getElementById("uuid-manhour").value = uuid;
            document.getElementById("level-manhour").innerHTML = $(this).data('level');
            document.getElementById("level-manhour").value = $(this).data('level');
            document.getElementById("rate-manhour").value = $(this).data('rate');
        });

    }
};

jQuery(document).ready(function () {
    Unit.init();
    Facility.init();
    Manhours.init();
});
