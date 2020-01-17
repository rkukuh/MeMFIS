@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                Release To Service
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

                            @include('frontend.common.label.create-new')

                            <h3 class="m-portlet__head-text">
                                Release To Service
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <form id="taskcardform" name="taskcardform">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Discrepancy Form @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C Type @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            Date @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <label class="form-control-label">
                                            A/C Reg @include('frontend.common.label.required')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>
                                </div>



                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Work Performed @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, doloribus.')
                                        @endcomponent
                                    </div>
                                </div>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <label class="form-control-label">
                                            Work Data / CAMP Reference @include('frontend.common.label.optional')
                                        </label>

                                        @component('frontend.common.label.data-info')
                                            @slot('text', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni quis modi veniam nemo sint natus debitis quod tempora repellendus officia cumque tenetur aut, maxime deserunt laudantium perferendis eius aperiam repudiandae veritatis a! Ipsa, vitae nihil? Aliquam, modi nemo. Sunt quod optio architecto quam similique corrupti vitae reiciendis praesentium ea molestias. Molestias voluptatum error impedit magnam laboriosam corrupti tempora exercitationem, repudiandae optio laudantium, beatae illum accusantium provident fugit porro dolorem. Quibusdam maiores asperiores animi fugit aliquam, atque voluptatem molestias quidem, eaque ex assumenda quam labore deserunt illo minima? Deleniti beatae exercitationem maiores voluptatibus vitae molestias? Commodi inventore laborum, deleniti aliquam est amet voluptates. Molestiae vel veritatis modi repudiandae inventore non nihil libero et veniam excepturi in accusantium reprehenderit nulla eum voluptate quasi rem nostrum fugit ex, illo voluptas deserunt obcaecati officia dolor. Vitae aliquid necessitatibus repudiandae suscipit aliquam? Dolor rem nisi, aliquid tempore, suscipit sapiente nulla adipisci quis repellendus temporibus pariatur.')
                                        @endcomponent
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Exception(s) @include('frontend.common.label.optional')
                                            </label>

                                            @component('frontend.common.label.data-info')
                                                @slot('text', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magni quis modi veniam nemo sint natus debitis quod tempora repellendus officia cumque tenetur aut, maxime deserunt laudantium perferendis eius aperiam repudiandae veritatis a! Ipsa, vitae nihil? Aliquam, modi nemo. Sunt quod optio architecto quam similique corrupti vitae reiciendis praesentium ea molestias. Molestias voluptatum error impedit magnam laboriosam corrupti tempora exercitationem, repudiandae optio laudantium, beatae illum accusantium provident fugit porro dolorem. Quibusdam maiores asperiores animi fugit aliquam, atque voluptatem molestias quidem, eaque ex assumenda quam labore deserunt illo minima? Deleniti beatae exercitationem maiores voluptatibus vitae molestias? Commodi inventore laborum, deleniti aliquam est amet voluptates. Molestiae vel veritatis modi repudiandae inventore non nihil libero et veniam excepturi in accusantium reprehenderit nulla eum voluptate quasi rem nostrum fugit ex, illo voluptas deserunt obcaecati officia dolor. Vitae aliquid necessitatibus repudiandae suscipit aliquam? Dolor rem nisi, aliquid tempore, suscipit sapiente nulla adipisci quis repellendus temporibus pariatur.')
                                            @endcomponent
                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label class="form-control-label">
                                                Approval @include('frontend.common.label.optional')
                                            </label>

                                            <div class="form-group m-form__group row">
                                                <div class="col-sm-4 col-md-4 col-lg-4">
                                                    @component('frontend.common.input.checkbox')
                                                        @slot('id', 'DGCA')
                                                        @slot('name', 'approval[]')
                                                        @slot('text', 'Indonesia DGCA No : 145D-093')
                                                        @slot('value', 'Indonesia DGCA No : 145D-093')
                                                        @slot('style_div','margin-top:30px')
                                                    @endcomponent
                                                </div>
                                                <!-- <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'FAA')
                                                    @slot('name', 'approval[]')
                                                    @slot('text', 'Federal Aviation Administration - FAA')
                                                    @slot('value', 'Federal Aviation Administration - FAA')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-4 col-md-4 col-lg-4">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'EASA')
                                                    @slot('name', 'approval[]')
                                                    @slot('text', 'European Union Aviation Safety Agency - EASA')
                                                    @slot('value', 'European Union Aviation Safety Agency - EASA')
                                                    @slot('style_div','margin-top:30px')
                                                @endcomponent
                                            </div> -->
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-group m-form__group row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                            <div class="flex">
                                                <div class="action-buttons">
                                                    @component('frontend.common.buttons.submit')
                                                        @slot('type','button')
                                                        @slot('id', 'add-RTS')
                                                        @slot('class', 'add-RTS')
                                                    @endcomponent

                                                    @include('frontend.common.buttons.reset')

                                                    @include('frontend.common.buttons.back')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('header-scripts')

@endpush

@push('footer-scripts')
<script src="{{ asset('js/frontend/discrepancy/create.js') }}"></script>
<script src="{{ asset('js/frontend/discrepancy/form-reset.js') }}"></script>

<script src="{{ asset('js/frontend/functions/datepicker/date.js')}}"></script>

<script src="{{ asset('js/frontend/functions/select2/applicability-airplane.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/applicability-airplane.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/otr-certification.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/zone.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/zone.js') }}"></script>

<script src="{{ asset('js/frontend/functions/select2/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/unit-tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/select2/tool.js') }}"></script>
<script src="{{ asset('js/frontend/functions/fill-combobox/tool.js') }}"></script>

@endpush
