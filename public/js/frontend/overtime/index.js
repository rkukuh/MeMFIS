let Overtime = {
    init: function () {
        $('.overtime_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/overtime',
                        map: (raw) => {
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
                serverFiltering: !0,
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
                    field: '#',
                    title: 'No',
                    width:'40',
                    sortable: 'asc',
                    filterable: !1,
                    textAlign: 'center',
                    template: (row, index, datatable) => {   
                        return (index + 1) + (datatable.getCurrentPage() - 1) * datatable.getPageSize()
                    }
                },
                {
                    field: 'date',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'uuid',
                    title: 'Overtime Number',
                    sortable: 'asc',
                    filterable: !1,
                    template: (t) => {;
                        // return '<a data-toggle="modal" data-target="#modal_transaction_overtime" href="/overtime/'+t.uuid+'" data-id="' + t.uuid +'">' + t.uuid + "</a>" 
                        // let stringify = JSON.stringify(t);
                        return "<a data-toggle='modal' href='#' data-target='#modal_transaction_overtime' data-id='"+ t.uuid +"'>" + t.uuid +"</a>"
                        // return '<a onclick="show('+t.uuid+')" data-id="' + t.uuid +'">' + t.uuid + "</a>"
                    }
                },
                {
                    field: 'nrp',
                    title: 'NRP',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'employee_name',
                    title: 'Employee Name',
                    sortable: 'asc',
                    filterable: !1,
                },
               
                {
                    field: 'start',
                    title: 'Start Time',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'end',
                    title: 'End Time',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'total',
                    title: 'Total',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'desc',
                    title: 'Description',
                    sortable: 'asc',
                    filterable: !1,
                    width:150,
                    template: (t)=>{
                        if (t.desc) {
                            data = strtrunc(t.desc, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'status',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'isApproved',
                    title: 'Approval',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'Actions',
                    title: 'Action',
                    sortable: !1,
                    overflow: 'visible',
                    template: (t, e, i) => {
                        let html = "-";
                        if (t.status !== "CLOSE") {
                            html = '<a href="/overtime/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#modal_approve" data-target="#modal_approve" data-toggle="modal" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Approve" data-id="' + t.uuid + '">' +
                                '<i class="la la-check"></i>' +
                            '</a>' +
                            '<a href="#modal_reject" data-toggle="modal" data-target="#modal_reject" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill approve" title="Reject" data-id="' + t.uuid + '">' +
                                '<i class="la la-remove"></i>' +
                            '</a>';
                        }
                        return html;
                    }
                }
            ]
        });     

    }
};

$('#modal_transaction_overtime').on('show.bs.modal', (e) => {
    let detail_data = $(e.relatedTarget).data('id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/overtime/' + detail_data,
        type: "GET",
        dataType: "json",
        success:(data) => {
            $("#overtime_employee").text(data.employee);
            $("#overtime_uuid").text(data.overtime.uuid);
            $("#overtime_date").text(data.overtime.date);
            $("#overtime_start").text(data.overtime.start);
            $("#overtime_end").text(data.overtime.end);
            $("#overtime_desc").text(data.overtime.desc);
            $("#overtime_status").text(data.approval_detail[0]);
            $("#overtime_total").text(data.total_diff);
            $("#overtime_created_at").text(data.overtime.created_at); 
            $("#overtime_approved_by").text(data.approval_detail[1]);
            $("#overtime_job").text(data.approval_detail[2]);
            $("#overtime_remark").text(data.approval_detail[3]);
        },
        error: (jqXhr, json, errorThrown) =>{
            let errors = jqXhr.responseJSON;
            $.each(errors.errors, (index, value) => {
                $('#kategori-error').html(value);
            });
        }
    });
});

$('#modal_approve').on('show.bs.modal', (e) => {
    let uuid = $(e.relatedTarget).data('id');
    approve(uuid)
    .then(data =>{
        $("#modal_approve").modal("toggle");
        let table = $('.overtime_datatable').mDatatable();
        table.originalDataSet = [];
        table.reload();
        toastr.success('Overtime has been approved.', 'Approved', {
            timeOut: 5000
        });
    })
    .catch(errors =>{
        $.each(errors.error, (index, value) => {
            toastr.error(value.message, value.title, {
                "closeButton": true,
                "timeOut": "0",
            }
            );
        });
    })
});

$('#modal_reject').on('show.bs.modal', (e) => {
    let uuid = $(e.relatedTarget).data('id');
    reject(uuid)
    .then(data =>{
        $("#modal_reject").modal("toggle");
        let table = $('.overtime_datatable').mDatatable();
        table.originalDataSet = [];
        table.reload();  
        toastr.success('Overtime has been rejected.', 'Rejected', {
            timeOut: 5000
        });
    })
    .catch(errors =>{
        $.each(errors.error, (index, value) => {
            toastr.error(value.message, value.title, {
                "closeButton": true,
                "timeOut": "0",
            }
            );
        });
    })
});

function approve(uuid) {
    return new Promise((resolve,reject) => {
        
        $("#btn_approve").on("click",()=>{
            let note = $("#remark_tool_approve").val();
            // e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/overtime/' + uuid + "/approve",
                type: "POST",
                data: {
                    note: note
                },
                success:(data) => {
                    resolve(data);
                },
                error: (jqXhr, json, errorThrown) =>{
                    let errors = jqXhr.responseJSON;
                    reject(errors);
                }
            });
        });
    });
}

function reject(uuid) {
    return new Promise((resolve,reject)=>{
        
        $("#btn_reject").on("click",()=>{
            let note = $("#remark_tool_reject").val();
            
            // e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/overtime/' + uuid + "/reject",
                type: "POST",
                data: {
                    note: note
                },
                success:(data) => {
                    resolve(data);
                },
                error: (jqXhr, json, errorThrown) =>{
                    let errorsHtml = '';
                    let errors = jqXhr.responseJSON;
                    reject(errors);
                }
            });
        });
    });
}

jQuery(document).ready(() => {
    Overtime.init();
});
