<div class="modal fade" id="facility_price"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.edit')

                <h5 class="modal-title" id="TitleModalItem">
                    Facility Price

                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="facilityPriceForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="workpackage_uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                Facility Name 
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'Facility Name')
                                    @slot('name', 'facility_name')
                                    @slot('id', 'facility_name')
                                    @slot('id_error', 'facility_name')
                                @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label class="form-control-label">
                                    Price @include('frontend.common.label.required')
                                </label>

                                @component('frontend.common.input.number')
                                    @slot('text', 'Discount')
                                    @slot('name', 'discount')
                                    @slot('id', 'discount')
                                    @slot('id_error', 'discount')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                        Marketing Note @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.textarea')
                                        @slot('text', 'Marketing Note')
                                        @slot('name', 'marketing_note')
                                        @slot('id', 'marketing_note')
                                        @slot('id_error', 'marketing_note')
                                    @endcomponent
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                    @component('frontend.common.buttons.update')
                                        @slot('class', 'discount')
                                        @slot('type', 'button')
                                    @endcomponent
                                    @component('frontend.common.buttons.reset')
                                        @slot('class', 'reset-sequance')
                                    @endcomponent
                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
