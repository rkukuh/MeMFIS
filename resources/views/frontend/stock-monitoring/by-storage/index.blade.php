<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row align-items-center" style="padding-bottom:15px">
        <div class="col-xl-8 order-2 order-xl-1">
            <div class="form-group m-form__group row align-items-center">
                <div class="col-md-4">
                    <div class="m-input-icon m-input-icon--left">
                    </div>
                </div>
                    @component('frontend.common.input.select2')
                        @slot('text', 'Storage')
                        @slot('id', 'item_storage_id')
                        @slot('name', 'item_storage_id')
                        @slot('id_error', 'item_storage_id')
                    @endcomponent
            </div>
        </div>
        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            <div class="m-separator m-separator--dashed d-xl-none"></div>
        </div>
    </div>

    <div class="m_datatable_by_storage" id="scrolling_both"></div>
</div>
