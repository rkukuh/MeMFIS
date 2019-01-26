<div style="background-color: {{ $background_color or 'beige' }};
            height:{{ $height or '50px' }};
            margin-top:{{ $height or '10px' }};">
  <div class="search-journal" id="search-journal" 
       style="line-height:{{ $line_height or '50px' }};
              margin-left:{{ $margin_left or '9px' }};">
      {{ $text or 'Search account code' }}
      @component('frontend.common.account-code.button-create')
          @slot('text', '')
          @slot('size', 'sm')
          @slot('icon', 'search')
          @slot('data_target', '#modal_account_code')
          @slot('style','float:right;margin-top:10px;margin-right:6px;')
      @endcomponent
  </div>
</div>