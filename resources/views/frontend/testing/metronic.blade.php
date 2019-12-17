@extends('frontend.master')
@section('content')
<div id="content-div">
    {{--
    <div class="container">
        <div class="col-md-12"> --}}

            <!--begin::Portlet-->
            <div class="m-portlet m-portlet--responsive-mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-placeholder-2 m--font-brand"></i>
                            </span>
                            <h3 class="m-portlet__head-text m--font-brand">
                                Contact US
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="m-portlet__body">
                    <div class="container">
                        <div class="row">

                                @component('frontend.common.jobcard.index')
                                    @slot('name_jobcard','jobcard')
                                    @slot('id_jobcard','jobcard')
                                @endcomponent
                                @include('frontend.common.jobcard.modal')


    @include('frontend.common.account-code.index')

                            <div class="col-md-6">
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.input.numeric')
                                            @slot('id', 'numeric')
                                            @slot('text', 'numeric')
                                            @slot('name', 'numeric')
                                        @endcomponent

                                        <div class="form-group m-form__group row ">
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                <label class="form-control-label">
                                                                        Email
    @include('frontend.common.label.required')
                                                                    </label>
                                                                    <input type="file" id="largeImage" name="name">
                                                {{-- <div id="m_repeater_1a">
                                                    <div class="" id="m_repeater_1a">
                                                        <div data-repeater-list="">
                                                            <div data-repeater-item class="row">
                                                                <div class="form-group m-form__group row align-items-center">
                                                                    <div class="col-md-6">
                                                                        <input type="file" id="largeImage" name="name">
                                                                                                                                               @component('frontend.common.input.upload') @slot('id',
                                                                        'largeImage') @slot('name', 'name') @endcomponent

                                                                    </div>
                                                                    <div class="col-md-3">
                                                                    </div>
                                                                    <div class="col-md-1">
                                                                        <div data-repeater-delete="" class="btn-sm btn btn-danger">
                                                                            <span>
                                                                                                    <i class="la la-trash-o"></i>
                                                                                                    <span>Delete</span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-form__group form-group row">
                                                        <div data-repeater-create="" class="btn btn btn-sm btn-brand m-btn m-btn--icon m-btn--pill m-btn--wide">
                                                            <span>
                                                                                    <i class="la la-plus"></i>
                                                                                    <span>Add</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>

                                        {{-- <input type="file" id="largeImage"> --}} {{-- @component('frontend.common.input.upload')
                                        @slot('id', 'largeImage') @endcomponent --}} {{--
                                        <div class="radio01">
                                            <label for="question1">question1</label><input type="radio" name="question1"
                                                id="question1" value="answer1">
                                            <label for="question1">question1</label><input type="radio" name="question1"
                                                id="question1" value="answer2">
                                            <label for="question1">question1</label><input type="radio" name="question1"
                                                id="question1" value="answer3">
                                            <label for="question1">question1</label><input type="radio" name="question1"
                                                id="question1" value="answer4">
                                            <label for="question1">question1</label><input type="radio" name="question1"
                                                id="question1" value="answer5">

                                        </div> --}} @component('frontend.common.input.radio') @slot('id', 'question1') @slot('text',
                                        'Question') @slot('name', 'question1') @slot('value', 'answer1') @endcomponent @component('frontend.common.input.radio')
                                        @slot('id', 'question1') @slot('text', 'Question') @slot('name', 'question1') @slot('value',
                                        'answer2') @endcomponent
                                        <div class="card-body">

                                            <button id="stepbutton2" class="add"> simpan</button>
                                        </div>


                                        <label class="form-control-label">
                                                        Email
                                                    </label> {{-- @component('frontend.common.input.email')
                                        @slot('id', 'email') @slot('text', 'Email') @slot('name', 'email') @endcomponent
                                        --}}
                                    </div>
                                </div>
                                <div class="form-group m-form__group row ">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                                        Message
                                                    </label> {{-- @component('frontend.common.input.textarea')
                                        @slot('rows', '3') @slot('id', 'message') @slot('name', 'message') @slot('text',
                                        'Message') @slot('description', 'text') @endcomponent --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="img/pbfix.png" alt="logo" height="100px" style="margin-left:20%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot">
                    @component('frontend.common.buttons.submit') @slot('size', 'md') @slot('style', 'margin-left:40%') @endcomponent
                </div>
            </div>
            <!--end::Portlet-->
        </div>

        {{-- </div>
</div> --}}
@endsection
 @push('footer-scripts')

<script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> --}}
<script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
<script src="{{ asset('/js/frontend/functions/accounting/accounting.js')}}"></script>
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script> --}}
<script src="{{ asset('/js/frontend/functions/number.js')}}"></script>
<script>

</script>
<script src="{{ asset('js/frontend/testing/test.js')}}"></script>


@endpush
