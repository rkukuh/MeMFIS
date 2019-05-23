<div class="tab-pane active show" id="m_tabs_workpackage" role="tabpanel">
    <div class="workpackage_datatable" id="scrolling_both"></div>
</div>
<div class="tab-pane" id="m_tabs_summary" role="tabpanel">

    <div class="summary_datatable" id="scrolling_both"></div>
    <br>
    <hr>
    <div class="form-group m-form__group row">
        <div class="col-sm-6 col-md-6 col-lg-6">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Sub Total
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            @component('frontend.common.label.data-info')
                @slot('id', 'sub_total')
                @slot('class', 'sub_total')
                @slot('text', $quotation->subtotal)
                @slot('value', $quotation->subtotal)
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>
    <div class='repeater'>
        <div data-repeater-list="group-document">
            <div data-repeater-item>
                <div class="form-group m-form__group row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <select id="type_website" name="type_website" class="form-control">
                            <option value="">
                                Select a Type
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        @component('frontend.common.input.text')
                            @slot('id', 'document')
                            @slot('name', 'document')
                            @slot('class', 'document')
                        @endcomponent
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @include('frontend.common.buttons.create_repeater')
                    </div>
                    <div class="col-sm-1 col-md-1 col-lg-1">
                        @include('frontend.common.buttons.delete_repeater')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-sm-6 col-md-6 col-lg-6">
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="m--align-left" style="padding-top:15px">
                Total in Rupiah
            </div>
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2">
            @component('frontend.common.label.data-info')
                @slot('id', 'grand_total')
                @slot('class', 'grand_total')
            @endcomponent
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
            <button type="reset" class="btn btn-default calculate" id="calculate">
                <span>
                    <i class="fa fa-calculator"></i>
                    Calculate
                </span>
            </button>
        </div>
        <div class="col-sm-1 col-md-1 col-lg-1">
        </div>
    </div>