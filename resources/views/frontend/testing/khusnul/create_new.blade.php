@extends('frontend.master')


@section('content')
 <div class="m-content">
     <div class="row">
	<div class="col-lg">
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
@include('frontend.common.label.create-new')

<h3 class="m-portlet__head-text"> Material Interchange
						</h3>
					</div>
				</div>
			</div>
<form class="m-form">
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <label for="example-text-input" class="col-3 col-form-label">Part Number :</label>
        <div class="col-4">
            @component('frontend.common.input.input')
                @slot('name', 'part')
            @endcomponent
        </div>
        <button class="btn btn-secondary" data-toggle="modal" data-target="#searchpn" type="button"><i class="fa fa-search"></i></button>
    </div>
    <div class="form-group m-form__group row">
        <label for="example-text-input" class="col-3 col-form-label">Item Description:</label>
        <div class="col-4">
            @component('frontend.common.input.input')
                @slot('name', 'description')
            @endcomponent
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label for="example-text-input" class="col-3 col-form-label">Interchange With Part Number :</label>
        <div class="col-4">
            @component('frontend.common.input.input')
                @slot('name', 'iw_part')
            @endcomponent
        </div>
        <button class="btn btn-secondary" data-toggle="modal" data-target="#searchipn" type="button"><i class="fa fa-search"></i></button>
    </div>
    <div class="form-group m-form__group row">
        <label for="example-text-input" class="col-3 col-form-label">Item Description:</label>
        <div class="col-4">
            @component('frontend.common.input.input')
                @slot('name', 'item_description')
            @endcomponent
        </div>
    </div>

    <div class="form-group m-form__group row">
        <label for="example-text-input" class="col-3 col-form-label">2-Way Interchange :</label>
        <div class="col-9">
            <div class="m-checkbox-inline">
		              @component('frontend.common.input.checkbox')
                         @slot('name', 'check')
                      @endcomponent

		    </div>
        </div>
    </div>
</div>
<div class="m-portlet__foot">
    <div class="m-form__actions">
        <div class="col align-self-end" align="right">
            @component('frontend.common.buttons.submit')
                @slot('name', 'save')
            @endcomponent
            @component('frontend.common.buttons.reset')
                @slot('name', 'reset')
            @endcomponent
            @component('frontend.common.buttons.back')
                @slot('name', 'back')
            @endcomponent
		            	</div>
					</div>
				</div>
			</form>
		</div>
	</div>		        </div>
			    		    </div>


		</div>
        <script src="{{ asset('assets/metronic/vendors/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/metronic/demo/default/custom/crud/datatables/data-sources/javascript.js') }}"></script>

@extends('frontend.testing.khusnul.modal')

@endsection
