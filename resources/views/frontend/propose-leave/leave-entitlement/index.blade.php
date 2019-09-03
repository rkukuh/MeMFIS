<div class="col-lg-12 col-md-12 col-sm-12">

    @hasanyrole('hrd|admin')
        <div class="row align-items-center" style="padding-bottom:15px">
            <div class="col-xl-7 order-2 order-xl-1">
                <div class="form-group m-form__group row align-items-center">
                    <div class="col-md-4">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input" placeholder="Search..."
                                id="generalSearch2">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span><i class="la la-search"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 order-1 order-xl-2 m--align-right">
                <p class="mt-3">Select Periode</p>
            </div>
            <div class="col-xl-3 order-1 order-xl-2 m--align-right">
                
                @component('frontend.common.input.datepicker')
                    @slot('id', 'daterange_leave_entitlement')
                    @slot('name', 'daterange_leave_entitlement')
                    @slot('id_error', 'daterange_leave_entitlement')
                @endcomponent

                <div class="m-separator m-separator--dashed d-xl-none"></div>
            </div>
        </div>

        <div class="leave_entitlement_datatable" id="scrolling_both"></div>

        @include('frontend.propose-leave.leave-entitlement.remaining-leave')
    @endrole

    @hasanyrole('employee')
    <div class="form-group m-form__group row">
        <div class="col-sm-2 col-md-2 col-lg-2">
            <p class="mt-3">Select Periode</p>
        </div>
        <div class="col-sm-3 col-md-3 col-lg-3">
            @component('frontend.common.input.datepicker')
                @slot('id', 'daterange_leave_entitlement')
                @slot('name', 'daterange_leave_entitlement')
                @slot('id_error', 'daterange_leave_entitlement')
                @slot('style','margin-left:-62px')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row mt-5">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h6 class="text-primary">Employee Name</h6>
            <h3 class="my-3 font-weight-bold">Yemima Khrisdian Tifani - 19020104</h3>
            <h4 class="mb-5 mt-2">Remaining 01/01/2019 - 31/12/2019</h4>
            <div class="form-group m-form__group row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="m-portlet  m-portlet--full-height ">
                        <div class="m-portlet__head" style="background:#1f71f2;">
                            <div class="row mt-4">
                                <div class="col-10">
                                    <h4 class="m-portlet__head-text" style="color:white;">
                                        Casual Leave 
                                    </h4>
                                </div>
                                <div class="col-2" style="margin-top:-8px;">
                                    <h4 class="m-portlet__head-text btn btn-light text-dark" style="margin-left:40px;">
                                        2
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget16">
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Approve Leave Days <b>1</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Pending Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Rejected Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Void Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <hr>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-primary">
                                        <h6 align="center">Leave Days Available to Use 4</h6>
                                    </div>
                                </div>				 
                            </div>			 			 
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="m-portlet  m-portlet--full-height ">
                        <div class="m-portlet__head" style="background:#1f71f2;">
                            <div class="row mt-4">
                                <div class="col-10">
                                    <h4 class="m-portlet__head-text" style="color:white;">
                                        Annual Leave 
                                    </h4>
                                </div>
                                <div class="col-2" style="margin-top:-8px;">
                                    <h4 class="m-portlet__head-text btn btn-light text-dark" style="margin-left:40px;">
                                        12
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget16">
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Approve Leave Days <b>1</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Pending Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Rejected Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <div class="form-group m-form__group row">
                                    <div class="col">
                                        <div class="m-widget15__item">
                                            <div class="row">
                                                <div class="col-8">
                                                    <span class="m-widget15__stats">
                                                        Void Leave Days <b>0</b>
                                                    </span>
                                                </div>
                                                <div class="col-4" align="right">
                                                    <span class="m-widget15__text">
                                                        63%
                                                    </span>		
                                                </div>
                                            </div>               	 
                                            <div class="m--space-10"></div>
                                            <div class="progress m-progress--sm">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>					 
                                </div>	
                                <hr>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 text-primary">
                                        <h6 align="center">Leave Days Available to Use 4</h6>
                                    </div>
                                </div>				 
                            </div>			 		 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endrole

</div>


@push('footer-scripts')
    <script src="{{ asset('js/frontend/functions/daterange/leave-entitlement.js')}}"></script>
@endpush