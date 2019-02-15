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
                        });
                        return '<select id="unit_id" name="unit_id" class="form-control m-input unit_id">'+
                            '<option value="">'+
                                'Select Unit'+
                            // '</option>'+
                            // '<option value="2">'+
                            //     'Select Unit2'+
                            // '</option>'+
                            // '<option value="3">'+
                            //     'Select Unit3'+
                            // '</option>'+

                        '</select>'

                    }
                },
                {
                    field: "description",
                    title: "Description",
                    template: function (t) {
                        return '<input type="text" id="qty" name="qty" class="form-control m-input">'
                    }
                },

            ]
        });

        $('.unit_id').on('change', function () {
            //set the visibility of the specify element based on the value of select
            alert('change');
            // $('#con-specify').toggle(this.value == 'other')
        });
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
