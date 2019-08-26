let Employee = {
    init: function () {
        $('.m_datatable_employee').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/employee',

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
                serverFiltering: !0,
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
                    field: 'name',
                    title: 'Employee',
                    sortable: 'asc',
                    width:290,
                    filterable: !1,
                    template: function (t) {
                        let employee_name = null

                        if(t.last_name == t.first_name){
                            employee_name = t.first_name
                        }else{
                            employee_name = t.first_name+' '+t.last_name
                        }

                        return '<div class="row"><div class="col-4"><div class="media align-items-center">'+
                        '<img alt="Image placeholder" src="assets/metronic/app/media/img/users/user5.jpg" class="m--img-rounded m--marginless">'+
                        '</div></div><div class="col-8 align-self-center"><span>'+ employee_name +'</span><br>'+
                        '<span><i class="la la-user"></i><span><a href="/employee/'+t.uuid+'">'+ t.code +'</span></span></div></div>'
                    }
                },
                {
                    field: 'dob',
                    title: 'Phone Number',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'dob',
                    title: 'Department',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'dob',
                    title: 'Position',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'dob',
                    title: 'Employee Status',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'hired_at',
                    title: 'Hired At',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'hired_at',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    template: function(e) {
                        var a = {
                            1: { title: "Pending", class: "m-badge--brand" },
                            2: { title: "Delivered", class: " m-badge--metal" },
                            3: { title: "Canceled", class: " m-badge--primary" },
                            4: { title: "Success", class: " m-badge--success" },
                            5: { title: "Info", class: " m-badge--info" },
                            6: { title: "Danger", class: " m-badge--danger" },
                            7: { title: "Warning", class: " m-badge--warning" }
                        };
                        return (
                            '<span class="m-badge ' +
                            a[e.Status].class +
                            ' m-badge--wide">' +
                            a[e.Status].title +
                            "</span>"
                        );
                    }
                },
                {
                    field: 'Actions',
                    width: 110,
                    title: 'Action',
                    sortable: !1,
                    overflow: 'visible',
                    template: function (t, e, i) {
                        return (
                            '<a href="/employee/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>'
                        );
                    }
                }
            ]
        });      
    }
};

jQuery(document).ready(function () {
    Employee.init();
});
