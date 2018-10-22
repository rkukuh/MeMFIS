<div style="background-color: beige; padding: 15px;">
    Search the account code

    @component('frontend.common.account-code.button-create')
        @slot('text', '')
        @slot('size', 'sm')
        @slot('style', 'margin-top: -5px')
        @slot('class', 'pull-right')
        @slot('icon', 'search')
        @slot('data_target', '#modal_account_code')
    @endcomponent
</div>

{{-- <div style="background-color: beige; padding: 10px;">
    100001000012 - Biaya Item

    @component('frontend.common.buttons.create-new')
        @slot('text', '')
        @slot('class', 'pull-right')
        @slot('icon', 'search')
        @slot('data_target', '#modal_account_code')
    @endcomponent
</div> --}}
@include('frontend.common.account-code.modal')

