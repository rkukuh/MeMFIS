
<div class="summary_datatable" id="scrolling_both"></div>
<br>
<hr>
<div class="form-group m-form__group row">
    <div class="col-sm-5 col-md-5 col-lg-5">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="m--align-left" style="padding-top:15px">
            Sub Total
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        @component('frontend.common.label.data-info')
            @slot('id', 'sub_total')
            @slot('class', 'sub_total')
            @slot('text', 'sub_total')
            @slot('value', 'sub_total')
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
                <div class="col-sm-5 col-md-5 col-lg-5">
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2">
                    <div class="m--align-left" style="padding-top:15px">
                        Additional Cost
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                    @component('frontend.common.input.number')
                        @slot('id', 'extra')
                        @slot('name', 'extra')
                        @slot('class', 'extra')
                        @slot('value' , 0)
                        @slot('min', 0)
                    @endcomponent
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    @component('frontend.common.buttons.create_repeater')
                        @slot('class', 'AddRow')
                    @endcomponent
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1" style="margin-left:-38px">
                    @component('frontend.common.buttons.delete_repeater')
                        @slot('class', 'DeleteRow')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-sm-5 col-md-5 col-lg-5">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="m--align-left" style="padding-top:15px">
            PPN
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        @component('frontend.common.input.checkbox')
            @slot('id', 'is_ppn')
            @slot('name', 'is_ppn')
            @slot('value', 1.1)
            @slot('text', 'Include 10% PPN')
            @slot('style_div','margin-top:15px')
            @slot('help_text','If Checked, 10% tax rate would be charged')
            @slot('icon', 'fa-info-circle m--font-info')
        @endcomponent
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1">
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1">
    </div>
</div>
<div class="form-group m-form__group row">
    <div class="col-sm-5 col-md-5 col-lg-5">
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <div class="m--align-left" style="padding-top:15px">
            Total in $
        </div>
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3">
        @component('frontend.common.label.data-info')
            @slot('id', 'grand_total')
            @slot('class', 'grand_total')
            @slot('text', 'grandtotal')
            @slot('value', 'grandtotal')
        @endcomponent
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1">
        <div class="btn btn-default calculate" id="calculate">
            <span>
                <i class="fa fa-calculator"></i>
                Calculate
            </span>
        </div>
    </div>
    <div class="col-sm-1 col-md-1 col-lg-1">
    </div>
</div>
