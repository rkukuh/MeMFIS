
<div class="form-group m-form__group row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__body">
                    <div class="form-group m-form__group row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Total Manhours
                            </label>

                            @component('frontend.common.label.data-info')
                                @slot('id', 'total_manhour')
                                @slot('name', 'total_manhour')
                                @if($total_manhour)
                                    @slot('text', $total_manhour)
                                    @slot('value', $total_manhour)
                                @else 
                                    @slot('text', '-')
                                @endif
                            @endcomponent
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="form-control-label">
                                Manhours Rate
                            </label>
                            @component('frontend.common.input.number')
                                @slot('id', 'manhour_rate')
                                @slot('name', 'manhour_rate')
                                @if(isset($quotation->data_defectcard))
                                    @slot('value', json_decode($quotation->data_defectcard)->manhour_rate )
                                @endif
                                @slot('id_error', 'manhour_rate')
                            @endcomponent
                        </div>
                    </div>
                    <div class="row align-items-center">

                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span><i class="la la-search"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">

                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>

                    </div>
                    <div class="defect_card_datatable" id="scrolling_both"></div>
                </div>
            </div>
        </div>
    </div>
