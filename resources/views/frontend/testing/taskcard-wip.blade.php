@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                TaskCard
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a href="" class="m-nav__link m-nav__link--icon">
                        <i class="m-nav__link-icon la la-home"></i>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="{{ route('frontend.taskcard.index') }}" class="m-nav__link">
                        <span class="m-nav__link-text">
                            TaskCard
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="m-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @include('frontend.common.label.datalist')

                            <h3 class="m-portlet__head-text">
                                TaskCard
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <button class="btn btn-filter">
                                    Advance Filter
                                </button>
                                <div class="advanceFilter">
    weewwew
                                </div>
                                <div class="col-xl-8 order-2 order-xl-1 advanceFilter">
                                    <div class="form-group m-form__group row align-items-center">
                                        {{-- <div class="col-md-4">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                            </div> --}}
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                @component('frontend.common.input.select2')
                                                @slot('text', 'Taskcard Type')
                                                @slot('id', 'taskcard_routine_type')
                                                @slot('multiple', 'multiple')
                                                @slot('name', 'taskcard_routine_type')
                                                @slot('id_error', 'taskcard_routine_type')
                                                @endcomponent
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                {{-- <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch"> --}}
                                                {{-- @component('frontend.common.input.select2')
                                                            @slot('id', 'filter')
                                                            @slot('text', 'filter')
                                                            @slot('name', 'filter')
                                                            @slot('multiple', 'multiple')
                                                            @slot('id_error', 'filter')
                                                        @endcomponent --}}

                                                {{-- <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span> --}}
                                            </div>
                                        </div>
                                        <div class="col-md-4 footer">
                                            <div class="m-input-icon m-input-icon--left">
                                                @component('frontend.common.buttons.submit')
                                                @slot('type','button')
                                                @slot('id', 'filter-btn')
                                                @slot('class', 'filter')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <div class="m-btn-group m-btn-group--pill btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <a href="{{route('frontend.taskcard-routine.create')}}" class="m-btn btn btn-primary">
                                            <span>
                                                <i class="la la-plus-circle"></i>
                                                <span>Routine</span>
                                            </span>
                                        </a>

                                        <div class="m-btn-group btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-primary m-btn m-btn--pill-last dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span>
                                                    <i class="la la-plus-circle"></i>
                                                    <span>Non - Routine</span>
                                                </span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="{{route('frontend.taskcard-eo.create')}}">
                                                    <span>
                                                        <i class="la la-plus-circle"></i>
                                                        <span>Engineering Order</span>
                                                    </span>
                                                </a>
                                                <a class="dropdown-item" href="{{route('frontend.taskcard-si.create')}}">
                                                    <span>
                                                        <i class="la la-plus-circle"></i>
                                                        <span>Special Instruction</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>

                        <div class="taskcard_datatable" id="scrolling_both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
<script src="{{ asset('js/frontend/functions/select2/taskcard-routine-type.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/taskcard-routine-type.js') }}"></script>

<script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
<script src="{{ asset('js/frontend/functions/select2/filter.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/filter.js') }}"></script>

<script>
    $('.btn-filter').on('click', function() {
        $('.advanceFilter').slideToggle();
    });
    $('.footer').on('click', '.filter', function() {

        let table = $('.taskcard_datatable').mDatatable();

        function strtrunc(str, max, add) {
            add = add || '...';
            return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
        };

        let taskcard_routine_type = $('#taskcard_routine_type').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/datatables/taskcard/filter',
            data: {
                _token: $('input[name=_token]').val(),
                taskcard_routine_type: taskcard_routine_type,
            },
            success: function(response) {
                let table = $('.taskcard_datatable').mDatatable();

                table.destroy();
                table = $('.taskcard_datatable').mDatatable({
                    data: {
                        type: "local",
                        source: response,
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
                    columns: [{
                            field: 'number',
                            title: 'Taskcard No',
                            sortable: 'asc',
                            filterable: !1,
                        },
                        {
                            field: 'title',
                            title: 'Title',
                            sortable: 'asc',
                            filterable: !1,
                            template: function(t, e, i) {
                                if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
                                    return '<a href="/taskcard-routine/' + t.uuid + '">' + t.title + "</a>"
                                } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
                                    return '<a href="/taskcard-eo/' + t.uuid + '">' + t.title + "</a>"
                                } else if (t.type.code == "si") {
                                    return '<a href="/taskcard-si/' + t.uuid + '">' + t.title + "</a>"
                                } else if (t.type.code == "preliminary") {
                                    return '<a href="/preliminary/' + t.uuid + '">' + t.title + "</a>"
                                } else {
                                    return (
                                        'dummy'
                                    );
                                }
                            }

                        },
                        {
                            field: 'type.name',
                            title: 'TC Type',
                            sortable: 'asc',
                            filterable: !1,
                        },
                        {
                            field: 'pesawat',
                            title: 'A/C',
                            sortable: 'asc',
                            filterable: !1,

                        },
                        {
                            field: 'skill',
                            title: 'Skill',
                            sortable: 'asc',
                            filterable: !1,
                        },
                        {
                            field: 'task.name',
                            title: 'Task Type',
                            sortable: 'asc',
                            filterable: !1,
                        },
                        {
                            field: 'estimation_manhour',
                            title: 'Manhours',
                            sortable: 'asc',
                            filterable: !1,
                        },
                        {
                            field: 'description',
                            title: 'Description',
                            sortable: 'asc',
                            filterable: !1,
                            template: function(t) {
                                if (t.description) {
                                    data = strtrunc(t.description, 50);
                                    return (
                                        '<p>' + data + '</p>'
                                    );
                                }

                                return ''
                            }
                        },
                        {
                            field: 'Actions',
                            sortable: !1,
                            overflow: 'visible',
                            template: function(t, e, i) {
                                if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
                                    return (
                                        '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                        '<i class="la la-pencil"></i>' +
                                        '</a>' +
                                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                        '</a>'
                                    );
                                } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
                                    return (
                                        '<a href="/taskcard-eo/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                        '<i class="la la-pencil"></i>' +
                                        '</a>' +
                                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                        '</a>'
                                    );
                                } else if (t.type.code == "si") {
                                    return (
                                        '<a href="/taskcard-si/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                        '<i class="la la-pencil"></i>' +
                                        '</a>' +
                                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                        '</a>'
                                    );
                                } else if (t.type.code == "preliminary") {
                                    return (
                                        '<a href="/preliminary/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                        '<i class="la la-pencil"></i>' +
                                        '</a>' +
                                        '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                        '<i class="la la-trash"></i>' +
                                        '</a>'
                                    );
                                } else {
                                    return (
                                        'dummy'
                                    );
                                }
                            }
                        }
                    ]
                });

                table.reload();

            }
        });

    });
</script>

<script>
    $("#filter").on("change", function() {




        // $(.m_datatable).mDatatable(url);
    });
</script>

<script>
    let TaskCard = {
        init: function() {
            function strtrunc(str, max, add) {
                add = add || '...';
                return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
            };

            $('.taskcard_datatable').mDatatable({
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            method: 'GET',
                            url: '/datatables/taskcard',
                            map: function(raw) {
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
                columns: [{
                        field: 'number',
                        title: 'Taskcard No',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'title',
                        title: 'Title',
                        sortable: 'asc',
                        filterable: !1,
                        template: function(t, e, i) {
                            if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
                                return '<a href="/taskcard-routine/' + t.uuid + '">' + t.title + "</a>"
                            } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
                                return '<a href="/taskcard-eo/' + t.uuid + '">' + t.title + "</a>"
                            } else if (t.type.code == "si") {
                                return '<a href="/taskcard-si/' + t.uuid + '">' + t.title + "</a>"
                            } else if (t.type.code == "preliminary") {
                                return '<a href="/preliminary/' + t.uuid + '">' + t.title + "</a>"
                            } else {
                                return (
                                    'dummy'
                                );
                            }
                        }

                    },
                    {
                        field: 'type.name',
                        title: 'TC Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'pesawat',
                        title: 'A/C',
                        sortable: 'asc',
                        filterable: !1,

                    },
                    {
                        field: 'skill',
                        title: 'Skill',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'task.name',
                        title: 'Task Type',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'estimation_manhour',
                        title: 'Manhours',
                        sortable: 'asc',
                        filterable: !1,
                    },
                    {
                        field: 'description',
                        title: 'Description',
                        sortable: 'asc',
                        filterable: !1,
                        template: function(t) {
                            if (t.description) {
                                data = strtrunc(t.description, 50);
                                return (
                                    '<p>' + data + '</p>'
                                );
                            }

                            return ''
                        }
                    },
                    {
                        field: 'Actions',
                        sortable: !1,
                        overflow: 'visible',
                        template: function(t, e, i) {
                            if ((t.type.code == "basic") || (t.type.code == "sip") || (t.type.code == "cpcp")) {
                                return (
                                    '<a href="/taskcard-routine/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                    '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            } else if ((t.type.code == "ad") || (t.type.code == "sb") || (t.type.code == "eo") || (t.type.code == "ea") || (t.type.code == "htcrr") || (t.type.code == "cmr") || (t.type.code == "awl")) {
                                return (
                                    '<a href="/taskcard-eo/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                    '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            } else if (t.type.code == "si") {
                                return (
                                    '<a href="/taskcard-si/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                    '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            } else if (t.type.code == "preliminary") {
                                return (
                                    '<a href="/preliminary/' + t.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + t.uuid + '">' +
                                    '<i class="la la-pencil"></i>' +
                                    '</a>' +
                                    '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-uuid="' + t.uuid + '">' +
                                    '<i class="la la-trash"></i>' +
                                    '</a>'
                                );
                            } else {
                                return (
                                    'dummy'
                                );
                            }
                        }
                    }
                ]
            });

            let remove = $('.taskcard_datatable').on('click', '.delete', function() {
                let tascard_uuid = $(this).data('uuid');

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
                                url: '/taskcard/' + tascard_uuid + '',
                                success: function(data) {
                                    toastr.success('Taskcard has been deleted.', 'Deleted', {
                                        timeOut: 5000
                                    });

                                    let table = $('.taskcard_datatable').mDatatable();

                                    table.originalDataSet = [];
                                    table.reload();
                                },
                                error: function(jqXhr, json, errorThrown) {
                                    let errors = jqXhr.responseJSON;

                                    $.each(errors.errors, function(index, value) {
                                        $('#delete-error').html(value);
                                    });
                                }
                            });
                        }

                    });
            });

        }
    };

    jQuery(document).ready(function() {
        TaskCard.init();
    });
</script>
@endpush