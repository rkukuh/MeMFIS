<div style="height:50px;background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '5px 5px 5px 5px' }};">

    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8">
                <label for="Item" class="search-item" id="search-item" style="margin-top:5px">{{ $text_search or 'Search Item' }}</label>
                {{-- <div class="search-item" id="search-item"> --}}

                {{-- </div> --}}
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
            @component('frontend.common.item.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_item_search')
            @endcomponent
        </div>

        <input type="hidden" class="input-item-uuid" name="{{ $name_item or 'item' }}" id="{{ $id_item or 'item' }}">
    </div>
</div>

{{-- TODO PUT THIS CODE UNDER INCLUDE MODAL --}}
{{-- @include('frontend.common.item.modal') --}}

@push('header-scripts')
<link
	href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css"
	rel="stylesheet">
<link
	href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"
    rel="stylesheet">
    <style>
        .dataTables_paginate a{
            color: #5867dd !important;
            padding: 0 10px;
        }
        .dataTables_info{
            margin-top:-10px;
            margin-left:10px;
        }
        .dataTables_length{
            margin-top:-30px;
            visibility: hidden;
        }
        .dataTables_length select{
            margin-top:30px;
            visibility: visible;
        }
    </style>
@endpush

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/item.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
@endpush
