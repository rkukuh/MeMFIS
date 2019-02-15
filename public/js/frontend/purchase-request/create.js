let PurchaseRequest = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/item',

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
                serverPaging: !0,
                serverSorting: !0
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
            columns: [{
                    field: 'code',
                    title: 'Part No.',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Material Name',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'qty',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<input type="text" id="qty" name="qty" class="form-control m-input">'
                    }
                },
                {
                    field: 'unit',
                    title: 'Unit',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        $(document).ready(function () {
                            units = function () {
                                $.ajax({
                                    url: '/get-units/',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        $('select[name="unit_id"]').empty();

                                        $('select[name="unit_id"]').append(
                                            '<option value=""> Select a Unit</option>'
                                        );

                                        $.each(data, function (key, value) {
                                            if(key == 4){
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" selected>' + value + '</option>'
                                                );
                                            }else{
                                                $('select[name="unit_id"]').append(
                                                    '<option value="' + key + '" >' + value + '</option>'
                                                );
                                            }
                                        });
                                    }
                                });
                            };

                            units();

                            // function myFunction(e) {
                            //     alert('s');
                            //     // document.getElementById("myText").value = e.target.value
                            // }

                        });

                        // return t.unit.name + ' (' + t.unit.symbol + ')'
                        return '<select id="unit_id" name="unit_id" class="form-control m-input unit_id">'+
                            // '<option value="">'+
                            //     'Select Unit'+
                            // '</option>'+

                        '</select>'

                    }
                },
                {
                    field: "available stock",
                    title: "Stock Available",
                    template: function (t) {
                        return '1'
                    }
                },
                {
                    field: 'actions',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/item/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + t.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });

        // $('select[name="unit_id"]').change(function(){
        //     //set the visibility of the specify element based on the value of select
        //     alert('change');
        //     // $('#con-specify').toggle(this.value == 'other')
        // });
        $(document).ready(function () {
        //     function myFunction(event) {
        //         alert('s');
        //         // document.getElementById("myText").value = e.target.value
        //     }

        });


    }
};

jQuery(document).ready(function () {
    PurchaseRequest.init();
});
