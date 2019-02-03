<div style="background-color: {{ $background_color or 'beige' }};
            height:{{ $height or '50px' }};
            margin-top:{{ $height or '10px' }};">
  <div class="search-journal" id="search-journal"
       style="line-height:{{ $line_height or '50px' }};
              margin-left:{{ $margin_left or '9px' }};">
      {{ $text or 'Search Purchase Order' }}
      @component('frontend.common.good-recieved-note.button-create')
          @slot('text', '')
          @slot('size', 'sm')
          @slot('icon', 'search')
          @slot('data_target', '#modal_purchase_order')
          @slot('style','float:right;margin-top:10px;margin-right:6px;')
      @endcomponent
  </div>
</div>
@include('frontend.common.good-recieved-note.modal')

@push('footer-scripts')
    <script src="{{ asset('js/frontend/common/good-recieved-note.js') }}"></script>
    <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
@endpush
