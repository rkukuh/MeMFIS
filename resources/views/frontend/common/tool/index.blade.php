<div style="height:50px;background-color: {{ $background_color or 'beige' }};
            padding: {{ $padding or '5px 5px 5px 5px' }};">

    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8">
                <label for="Tool" class="search-tool" id="search-tool" style="margin-top:5px">{{ $text_search or 'Search Tool' }}</label>
                {{-- <div class="search-tool" id="search-tool"> --}}

                {{-- </div> --}}
        </div>

        <div class="col-sm-3 col-md-3 col-lg-3 text-right" style="padding: 0;">
            @component('frontend.common.tool.button-create')
                @slot('text', '')
                @slot('size', 'sm')
                @slot('icon', 'search')
                @slot('data_target', '#modal_tool_search')
            @endcomponent
        </div>

        <input type="hidden" class="input-tool-uuid" name="{{ $name_tool or 'tool' }}" id="{{ $id_tool or 'tool' }}">
    </div>
</div>

{{-- TODO PUT THIS CODE UNDER INCLUDE MODAL --}}
{{-- @include('frontend.common.tool.modal') --}}

@push('header-scripts')
<link
	href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css"
	rel="stylesheet">
<link
	href="//cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"
	rel="stylesheet">
@endpush

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/tool.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
@endpush
