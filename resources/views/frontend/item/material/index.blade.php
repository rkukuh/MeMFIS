@extends('frontend.master')

@section('content')
    <div class="m-subheader hidden">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">
                    Material
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
                        <a href="{{ route('frontend.item.index') }}" class="m-nav__link">
                            <span class="m-nav__link-text">
                                Material
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
                                    Material
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 order-2 order-xl-1">
                                        <div class="form-group m-form__group row align-items-center">
                                            <div class="col-md-4">
                                                <div class="m-input-icon m-input-icon--left">
                                                    {{-- <input type="text" class="form-control m-input" placeholder="Search..."
                                                        id="generalSearch">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                        @component('frontend.common.buttons.create')
                                            @slot('text', 'Material')
                                            @slot('href', route('frontend.item.create') )
                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="item_datatable" id="scrolling_both"></div> --}}
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                        {{-- <table class="datatable22" cellspacing="0"
                                        width="100%" role="grid"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>UUDID</th>
                                                <th>NAME</th>
                                                <th>CODE</th>
                                                <th>IS STOCK</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table> --}}
                                    <table class="table table-striped table-bordered table-hover table-checkable" id="basic_datatable">
                                            <thead>
                                                <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Taxable?</th>
                                                        <th>Stockable?</th>
                                                        <th>Account Code</th>
                                                        <th></th>
                                                </tr>
                                            </thead>
                                        </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('header-scripts')
<link
	href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css"
	rel="stylesheet">
<link
	href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"
	rel="stylesheet">
@endpush
@push('footer-scripts')
    {{-- <script src="{{ asset('js/frontend/item/material/index.js') }}"></script> --}}
    {{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script> --}}

	{{-- <script
		src="https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js"></script> --}}
	<script>
    $(document).ready(function(){
      $('#basic_datatable').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: '{{ route('testing.serverSide') }}',
            columnDefs: [
                         {
                             targets: [ 0, 1, 2 ],
                             className: 'mdl-data-table__cell--non-numeric'
                         }
                     ],
            columns: [
                {data: 'code', name: 'code',sWidth:'15%',render:function(data, type, row){
                    return "<a href='/item/"+ row.uuid +"'>" + row.code + "</a>"
                }},
                {data: 'name', name: 'name',sWidth:'15%'},
                {data: 'caterory', name: 'caterory',sWidth:'15%',render:function(data, type, row){
                    return row.categories[0].name
                }},
                {data: 'unit.name', name: 'unit.name',sWidth:'10%',render:function(data, type, row){
                    if (row.is_ppn === 1) {
                        return '<span class="m-badge m-badge--brand m-badge--wide">PPN: ' + row.ppn_amount + '%</span>'
                    }
                    else {
                        return '<span class="m-badge m-badge--warning m-badge--wide">No</span>'
                    }
                }},
                {data: 'unit.name', name: 'unit.name',sWidth:'10%',render:function(data, type, row){
                    if (row.is_stock) {
                        var e = {
                            1: {
                                title: "Yes",
                                class: "m-badge--brand"
                            },
                            0: {
                                title: "No",
                                class: " m-badge--warning"
                            }
                        };

                        return '<span class="m-badge ' + e[row.is_stock].class + ' m-badge--wide">' + e[row.is_stock].title + "</span>"
                        }
                    return ''
                }},
                {data: 'name', name: 'name',sWidth:'15%'},
                {data: '', name: '',sWidth:'10%',render:function(data, type, row){
                    return (
                            '<a href="/item/' + row.uuid + '/edit" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit" title="Edit" data-id="' + row.uuid +'">' +
                                '<i class="la la-pencil"></i>' +
                            '</a>' +
                            '<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill delete" title="Delete" data-id="' + row.uuid + '">' +
                                '<i class="la la-trash"></i>' +
                            '</a>'
                        );
                }},
                // {data: 'updated_at', name: 'updated_at',sWidth:'10%'}
            ]
        });

    });
  </script>
@endpush
