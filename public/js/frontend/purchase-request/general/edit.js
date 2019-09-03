let PurchaseRequest = {
    init: function () {
        $('.item_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/purchase-request/item/'+pr_uuid+'/general',

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
                    field: 'pivot.quantity',
                    title: 'Project Requirement Qty',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '',
                    title: 'Stock Available',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: "quantity",
                    title: "Request Qty",
                },
                {
                    field: "item.unit.name",
                    title: "Unit",
                },
                {
                    field: "",
                    title: "Remark",
                },
            ]
        });
        $('#item_datatable').on('click','.select-item', function () {
            let item_uuid = $(this).attr('data-uuid');
            $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 url: '/purchase-request/'+pr_uuid+'/item/'+item_uuid,
                 type: 'post',
                 success: function (response) {

                         toastr.success('Item has been added.', 'Success', {
                             timeOut: 5000
                         });

                         let table = $('.item_datatable').mDatatable();

                         table.originalDataSet = [];
                         table.reload();
                     }

             });
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
            let date = new Date($('input[name=date]').val());
            let date_required = new Date($('input[name=date-required]').val());
            let description = $('#description').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/purchase-request',
                type: 'PUT',
                data: {
                    number:number,
                    type_id:type_id,
                    date:date,
                    date_required:date_required,
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
    PurchaseRequest.init();
});
