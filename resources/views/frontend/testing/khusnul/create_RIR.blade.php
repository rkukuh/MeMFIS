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

<h3 class="m-portlet__head-text"> RIR (Receiving Insspection Report)
						</h3>
					</div>
				</div>
			</div>
<form class="m-form">
<div class="m-portlet__body">
    <div class="form-group m-form__group row">
        <div class="col-6">
            @component('frontend.common.input.input')
                @slot('name', 'part')
                @slot('placeholder', 'RIR no')
            @endcomponent
        </div>
        <div class="col-6">
            @component('frontend.common.input.select')
                @slot('name', 'select')
                @slot('entity', 'Purchase Order No')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-12">
            @component('frontend.common.input.select')
                @slot('name', 'part')
                @slot('entity', 'Supplier')
                @slot('id', 'm_select2_1')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group row">
        <div class="col-6">
            @component('frontend.common.input.input')
                @slot('name', 'part')
                @slot('placeholder', 'Delivery Document')
            @endcomponent
        </div>
        <div class="col-5">
            @component('frontend.common.input.datepicker')
                @slot('name', 'part')
                @slot('placeholder', 'Date')
            @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group">
        <label class="form-control-label" for="inputSuccess1">Status</label>
        <div class="m-checkbox-inline">
                @component('frontend.testing.khusnul.checkbox-inline')
                    @slot('name', '1')
                    @slot('text','Purchase')
                @endcomponent
                @component('frontend.testing.khusnul.checkbox-inline')
                     @slot('name', '2')
                     @slot('text','Repair')
                @endcomponent
                @component('frontend.testing.khusnul.checkbox-inline')
                     @slot('name', '3')
                     @slot('text','Serviceable')
                @endcomponent
                @component('frontend.testing.khusnul.checkbox-inline')
                     @slot('name', '4')
                     @slot('text','Unserviceable')
                @endcomponent
        </div>
    </div>
    <div class="form-group m-form__group">
        @component('frontend.common.buttons.create-new')
            @slot('name', '3')
            @slot('text','ADD Item')
            @slot('data_target', '#add-rir')
        @endcomponent
    </div>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <table class="table table-striped table-hover table-checkable" id="m_table_1">
                <thead>
                <tr>
                    <th>No</th>
                    <th>P/N No.</th>
                    <th>Item Description</th>
                    <th>S/N No.</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td nowrap><a data-toggle="modal" data-target="#edit-rir" class="fa fa-edit"></a> <a class="fa fa-trash"></a></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
    <div>
        <h5>
        1. PACKING & HANDLING CHECK
        </h5>
    </div>
    <div class="m-portlet m-portlet--mobile col-9">
        <div class="m-portlet__body">
            <div class="m-portlet__head">
                <div class="col-5">
                    Type
                </div>
                <div class="col-5">
                    Condition
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-6">
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '1')
                        @slot('text','Reusable Container')
                    @endcomponent
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '2')
                        @slot('text','Wooden Box')
                    @endcomponent
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '3')
                        @slot('text','Carton Box')
                    @endcomponent
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '4')
                        @slot('text','Unpacked')
                    @endcomponent
                </div>
                <div class="col-6">
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '1')
                        @slot('text','Statisfactory')
                    @endcomponent
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '2')
                        @slot('text','Unsatisfactory')
                    @endcomponent
                </div>
                <div class="col-12">
                    @component('frontend.common.input.input')
                        @slot('name', 'part')
                        @slot('placeholder', 'If Unsatisfactory Explain:')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
    <div>
        <h5>
            2. PRESERVATION CHECK
        </h5>
    </div>
    <div class="m-portlet m-portlet--mobile col-9">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="checkbox-inline col-9">
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '1')
                        @slot('text','Reusable Container')
                    @endcomponent
                    @component('frontend.testing.khusnul.checkbox-inline')
                        @slot('name', '2')
                        @slot('text','Wooden Box')
                    @endcomponent
                </div>
                <div class="col-12">
                    @component('frontend.common.input.input')
                        @slot('name', 'part')
                        @slot('placeholder', 'If Unsatisfactory Explain:')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <div>
        <h5>
            3. DOCUMENTS CHECK
        </h5>
    </div>
    <div class="m-portlet m-portlet--mobile col-9">
        <div class="m-portlet__body">
            <div class="m-portlet__head">
                <div class="col-5">
                    General Document
                </div>
                <div class="col-5">
                    Technical Document
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-6">
                    @component('frontend.common.input.checkbox')
                        @slot('name', '1')
                        @slot('text','Invoice')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '2')
                        @slot('text','Airway Bill')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '3')
                        @slot('text','Shipping Document')
                    @endcomponent
                </div>
                <div class="col-6">
                    @component('frontend.common.input.checkbox')
                        @slot('name', '1')
                        @slot('text','Certificate of Conformity')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '2')
                        @slot('text','ARC/AAT')
                    @endcomponent
                </div>
                <div class="col-12">
                    @component('frontend.common.input.input')
                        @slot('name', 'part')
                        @slot('placeholder', 'If Unsatisfactory Explain:')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <div>
        <h5>
            4. MATERIAL CHECK
        </h5>
    </div>
    <div class="m-portlet m-portlet--mobile col-10">
        <div class="m-portlet__body">
            <div class="m-portlet__head">
                <div class="col-4">
                    Condition
                </div>
                <div class="col-4">
                    Quality/Complete
                </div>
                <div class="col-4" align="center">
                    Identification
                </div>
            </div>
            <div class="form-group m-form__group row">
                <div class="col-4">
                    @component('frontend.common.input.checkbox')
                        @slot('name', '1')
                        @slot('text','Statisfactory')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '2')
                        @slot('text','Unsatisfactory')
                    @endcomponent
                </div>
                <div class="col-4">
                    @component('frontend.common.input.checkbox')
                        @slot('name', '1')
                        @slot('text','Conform')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '2')
                        @slot('text','Not Conform')
                    @endcomponent
                </div>
                <div class="col-4">
                    @component('frontend.common.input.checkbox')
                        @slot('name', '1')
                        @slot('text','Conform')
                    @endcomponent
                    @component('frontend.common.input.checkbox')
                        @slot('name', '2')
                        @slot('text','Not Conform')
                    @endcomponent
                </div>
                <div class="col-12">
                    @component('frontend.common.input.input')
                        @slot('name', 'part')
                        @slot('placeholder', 'If Unsatisfactory Explain:')
                    @endcomponent
                </div>
            </div>
        </div>
    </div>

    <div>
        <h5>
            5. DECISION
        </h5>
    </div>
    <div class="m-portlet m-portlet--mobile col-10">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <div class="col-12">
                    @component('frontend.common.input.input')
                        @slot('name', 'part')
                        @slot('placeholder', 'Freetext')
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

@extends('frontend.testing.khusnul.add_rir')

@endsection
