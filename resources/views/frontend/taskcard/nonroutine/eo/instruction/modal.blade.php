<div class="modal fade" id="modal_instruction" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalInstruction">
                    Instruction

                    <small id="instruction" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id=InstructionForm">
                        <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Work Area @include('frontend.common.label.required')
                                    </label>

                                    @component('frontend.common.input.select2')
                                        @slot('text', 'Work Area')
                                        @slot('id', 'work_area')
                                        @slot('name', 'work_area')
                                        @slot('id_error', 'work-area')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Skill @include('frontend.common.label.required')
                                    </label>

                                        @component('frontend.common.input.select2')
                                            @slot('text', 'Otr Certification')
                                            @slot('id', 'otr_certification')
                                            @slot('name', 'otr_certification')
                                            @slot('id_error', 'otr-certification')
                                        @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="row ">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Manhour @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.decimal')
                                                    @slot('id', 'manhour')
                                                    @slot('text', 'Manhour')
                                                    @slot('name', 'manhour')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                <label class="form-control-label">
                                                    Helper Quantity @include('frontend.common.label.required')
                                                </label>

                                                @component('frontend.common.input.number')
                                                    @slot('id', 'helper_quantity')
                                                    @slot('text', 'Helper Quantity')
                                                    @slot('name', 'helper_quantity')
                                                @endcomponent
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'is_rii')
                                        @slot('name', 'is_rii')
                                        @slot('text', 'RII?')
                                        @slot('style_div','margin-top:30px')
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row ">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="m-portlet">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>

                                                    @include('frontend.common.label.datalist')

                                                    <h3 class="m-portlet__head-text">
                                                        Tool Required
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet m-portlet--mobile">
                                            <div class="m-portlet__body">
                                                <div class="row align-tools-center" style="margin-top:20px">
                                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                                        @component('frontend.common.buttons.create-new')
                                                            @slot('text', 'Tool Taskcard')
                                                            @slot('id', 'tool_taskcard')
                                                            @slot('data_target', '#modal_tool')
                                                        @endcomponent

                                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                    </div>
                                                </div>

                                                <div class="tool_datatable" id="tool_datatable"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-portlet">
                                        <div class="m-portlet__head">
                                            <div class="m-portlet__head-caption">
                                                <div class="m-portlet__head-title">
                                                    <span class="m-portlet__head-icon m--hide">
                                                        <i class="la la-gear"></i>
                                                    </span>

                                                    @include('frontend.common.label.datalist')

                                                    <h3 class="m-portlet__head-text">
                                                        Material Required
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-portlet m-portlet--mobile">
                                            <div class="m-portlet__body">
                                                <div class="row align-items-center" style="margin-top:20px">
                                                    <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                                        @component('frontend.common.buttons.create-new')
                                                            @slot('text', 'Item Taskcard')
                                                            @slot('id', 'item_taskcard')
                                                            @slot('data_target', '#modal_item')
                                                        @endcomponent

                                                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                                                    </div>
                                                </div>

                                                <div class="item_datatable" id="item_datatable"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="flex">
                                <div class="action-buttons">
                                        @component('frontend.common.buttons.submit')
                                            @slot('class', 'add-item')
                                            @slot('type', 'button')
                                        @endcomponent
                                        @component('frontend.common.buttons.reset')
                                            @slot('class', 'reset-item')
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
