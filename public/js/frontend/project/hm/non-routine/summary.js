let summarynonroutine = {
    init: function () {
        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        $('.adsb_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ad-sb/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.adsb_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ad-sb/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.cmrawl_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/cmr-awl/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.cmrawl_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/cmr-awl/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.si_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.si_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/si/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.preliminary_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/preliminary/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.preliminary_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/preliminary/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.ea_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ea/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.ea_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/ea/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.eo_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/eo/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.eo_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/eo/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.preliminary_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/preliminary/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.preliminary_materials_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/preliminary/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.nonroutine_tools_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/non-routine/tools',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });

        $('.nonroutine_items_datatable').mDatatable({
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'GET',
                        url: '/datatables/workpackage/'+workPackage_uuid+'/non-routine/materials',
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
            columns: [
            {
                field: 'tackcard_number',
                title: 'Taskcard No.',
                sortable: !1,
            },
            {
                field: 'code',
                title: 'P/N',
                sortable: !1,
            },
            {
                field: 'name',
                title: 'Title',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'pivot.quantity',
                title: 'Qty',
                sortable: 'asc',
                filterable: !1,
            },
            {
                field: 'unit_name',
                title: 'Unit',
                sortable: 'asc',
                filterable: !1,

            },
            {
                field: 'pivot.note',
                title: 'Remarks',
                sortable: 'asc',
                filterable: !1,
                template: function (t) {
                    if (t.pivot.note) {
                        data = strtrunc(t.pivot.note, 50);
                        return (
                            '<p>' + data + '</p>'
                        );
                    }

                    return ''
                }
            },
            // {
            //     field: 'Actions',
            //     sortable: !1,
            //     overflow: 'visible',
            //     template: function (t, e, i) {
            //         return (
            //             '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete-material" title="Delete" data-uuid="' + t.uuid + '">' +
            //                 '<i class="la la-trash"></i>' +
            //             '</a>'
            //         );
            //     }
            // }
            ]
        });
    }
};

jQuery(document).ready(function () {
    summarynonroutine.init();
});
