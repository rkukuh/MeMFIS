@extends('frontend.master')

@section('content')
<div id="content-div">
		{{-- <div class="container">
                <div class="col-md-12"> --}}

                	<!--begin::Portlet-->
		<div class="m-portlet m-portlet--responsive-mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon">
                                <i class="flaticon-placeholder-2 m--font-brand"></i>
                            </span>
                            <h3 class="m-portlet__head-text m--font-brand">
                                    Contact US
                                </h3>                        </div>			
                    </div>

                </div>
                <div class="m-portlet__body">
                    <div class="container">
                        <div class="row">
      
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="col-md-6">
                                    <input id="myInput" type="file" multiple style="display:none" />
                                    @component('frontend.common.buttons.browse')
                                        @slot('text', 'Add Files')
                                        @slot('name', 'myButton')
                                        @slot('id', 'myButton')
                                        @slot('icon','fa-plus')
                                    @endcomponent

                                </div>
                            </div>
                    </div>
                </div>
                <div class="m-portlet__foot" >
								@component('frontend.common.buttons.submit')
									@slot('size', 'md')
									@slot('style', 'margin-left:40%')
								@endcomponent
                </div>
            </div>	
            <!--end::Portlet-->
        </div>
    
			{{-- </div>
		</div> --}}

@endsection

@push('footer-scripts')
    {{-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script> --}}
    <script src="{{ asset('assets/metronic/demo/default/custom/crud/forms/widgets/form-repeater.js')}}"></script>
    <script src="{{ asset('js/frontend/testing/testing2.js')}}"></script>
@endpush