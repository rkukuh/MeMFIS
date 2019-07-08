let PurchaseRequestGeneral = {
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
                    title: 'Part Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<a href="/item/'+t.uuid+'">' + t.code + "</a>"
                    }
                },
                {
                    field: 'name',
                    title: 'Item Description',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'qty',
                    title: 'Quantity',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        return '<input type="number" id="qty" name="qty" class="form-control m-input">'
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
                    title: "Stock Available",
                    template: function (t) {
                        return '<input type="text" id="qty" name="qty" class="form-control m-input">'
                    }
                },
                {
                    field: "description",
                    title: "Remark",
                    template: function (t) {
                        return '<input type="text" id="qty" name="qty" class="form-control m-input">'
                    }
                },
                {
                    field: "description",
                    title: "Action",
                    template: function (t) {
                        return '<input type="text" id="qty" name="qty" class="form-control m-input">'
                    }
                },

            ]
        });

        $(function(){
            $('input[type="radio"]').click(function(){
              if ($(this).is(':checked'))
              {
                // alert($(this).val());
                if($(this).val() == 'general'){
                    $('.project').addClass('hidden');
                }
                else if($(this).val() == 'project'){
                    $('.project').removeClass('hidden');
                }
              }
            });
        });

        $('.footer').on('click', '.add-pr', function () {
            let number = $('input[name=number]').val();
            let type_id = $('input[name=type]').val();
            // let project_id = $('input[name=project]').val();
            let date = $('input[name=date]').val();
            let date_required = $('input[name=date-required]').val();
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-request',
                type: 'POST',
                data: {
                    number:number,
                    type_id:type_id,
                    requested_at:date,
                    required_at:date_required,
                    description:description,
                },
                success: function (response) {
                    if (response.errors) {
                        console.log(errors);
                        // if (response.errors.title) {
                        //     $('#title-error').html(response.errors.title[0]);
                        // }

                        // document.getElementById('manual_affected_id').value = manual_affected_id;


                    } else {
                        //    taskcard_reset();


                        toastr.success('Taskcard has been created.', 'Success', {
                            timeOut: 5000
                        });

                        window.location.href = '/purchase-request/'+response.uuid+'/edit';
                    }
                }
            });
        });

    }
};

jQuery(document).ready(function () {
    PurchaseRequestGeneral.init();
});
