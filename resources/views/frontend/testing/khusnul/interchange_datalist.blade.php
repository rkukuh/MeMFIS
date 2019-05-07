@extends('frontend.master')

@section('content')
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
                                    Material Interchange Datalist
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet m-portlet--mobile">
                        <div class="m-portlet__body">
                            <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30 ">
                                <div class="row align-items-right">
                                    <div class="col-xl-8 order-2 order-xl-1 m--align-right">
                                        <div class="form-group m-form__group row align-items-right">
                                            <div class="col-md-4">
                                                    <input type="text" class="form-control m-input" placeholder="Filter..." id="generalSearch"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                        
                                        @component('frontend.common.buttons.create')
                                            @slot('text', 'Create New')

                                        @endcomponent

                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                    </div>
                                </div>
                            </div>
 
                            <div class="journal_datatable" id="scrolling_both"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="{{ asset('assets/metronic/vendors/base/vendors.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/demo/default/base/scripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/app/js/dashboard.js') }}"></script>

@endsection

@push('footer-scripts')
    <script src="{{ asset('js/frontend/journal.js')}}"></script>
@endpush
