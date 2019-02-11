<div style="background-color: {{ $background_color or 'beige' }};
            height:{{ $height or '50px' }};
            margin-top:{{ $height or '10px' }};">
  <div class="search-purchase_request" id="search-purchase_request"
       style="line-height:{{ $line_height or '50px' }};
              margin-left:{{ $margin_left or '9px' }};">
      {{ $text or 'Search Purchase Request' }}
      @component('frontend.common.purchase-request.button-create')
          @slot('text', '')
          @slot('size', 'sm')
          @slot('icon', 'search')
          @slot('data_target', '#modal_purchase_request')
          @slot('style','float:right;margin-top:10px;margin-right:6px;')
      @endcomponent
  </div>
</div>
@include('frontend.common.purchase-request.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/purchase-request.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
