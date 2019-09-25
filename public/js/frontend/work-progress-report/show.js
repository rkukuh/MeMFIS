let WorkProgressReportShow = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.work_progress_report_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/jobcard',

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
                serverFiltering: !1,
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
                    field: 'number',
                    title: 'Date',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                            return '<a href="/jobcard-ppc/'+t.uuid+'">' + t.number + "</a>"
                    }
                },
                {
                    field: 'jobcardable.number',
                    title: 'Project No.',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcardable.title',
                    title: 'Title Taskcard',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcardable.type.name',
                    title: 'Taskcard Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcardable.task.name',
                    title: 'A/C Type',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: 'jobcardable.description',
                    title: 'Skill',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t) {
                        if (t.jobcardable.description) {
                            data = strtrunc(t.jobcardable.description, 50);
                            return (
                                '<p>' + data + '</p>'
                            );
                        }

                        return ''
                    }
                },
                {
                    field: 'jobcardable.skill.name',
                    title: 'Mhrs',
                    sortable: 'asc',
                    filterable: !1,
                },
                {
                    field: '1',
                    title: 'Status',
                    sortable: 'asc',
                    filterable: !1,
                    template: function (t, e, i) {
                        return (
                            '<button data-toggle="modal" data-target="#modal_material" type="button" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill material" title="Material" data-uuid=' +
                            t.uuid +
                            '>\t\t\t\t\t\t\t<i class="la la-wrench"></i></button>\t\t\t\t\t\t'
                        );
                    }

                }
            ]
        });
        
        $.ajax({
            url : '/morris/get-overall/'+ project_uuid,    
            method : 'get',
            dataType : 'json'
        }).done(function(data){
            Morris.Donut({
                element: 'm_chart_overall_progress',
                labelColor: "#a7a7c2",
                data: data,
                resize: true,
                colors: [mApp.getColor("accent"), mApp.getColor("brand"), mApp.getColor("danger"), '#1ab394', '#54cdb4','#1ab394']
            });
    
        }).fail(function(){
    
        });

        $.ajax({
            url : '/morris/get-routine/'+ project_uuid,    
            method : 'get',
            dataType : 'json'
        }).done(function(data){
            Morris.Donut({
                element: 'm_chart_routine',
                labelColor: "#a7a7c2",
                data: data,
                resize: true,
                colors: [mApp.getColor("accent"), mApp.getColor("brand"), mApp.getColor("danger"), '#1ab394', '#54cdb4','#1ab394']
            });
    
        }).fail(function(){
    
        });

        $.ajax({
            url : '/morris/get-non-routine/'+ project_uuid,    
            method : 'get',
            dataType : 'json'
        }).done(function(data){
            Morris.Donut({
                element: 'm_chart_non_routine',
                labelColor: "#a7a7c2",
                data: data,
                resize: true,
                colors: [mApp.getColor("accent"), mApp.getColor("brand"), mApp.getColor("danger"), '#1ab394', '#54cdb4','#1ab394']
            });
    
        }).fail(function(){
    
        });
      
    }
};

jQuery(document).ready(function () {
    WorkProgressReportShow.init();
});
