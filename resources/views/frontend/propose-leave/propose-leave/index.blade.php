<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="row align-items-center" style="padding-bottom:15px">
        <div class="col-xl-8 order-2 order-xl-1">
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
                @include('frontend.common.buttons.filter')
            </div>
        </div>
        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
            @component('frontend.common.buttons.create')
                @slot('text', 'Propose Leave')
                @slot('href', route('frontend.leave.create') )
            @endcomponent

            <div class="m-separator m-separator--dashed d-xl-none"></div>
        </div>
    </div>

    <div class="col-lg-12">
        @include('frontend.overtime.filter')
    </div>

    <div class="propose_leave_datatable" id="scrolling_both"></div>

    <!-- @include('frontend.propose-leave.modal-approve') -->
    <!-- @include('frontend.propose-leave.modal-reject') -->
    @include('frontend.propose-leave.propose-leave.transaction-view')
</div>