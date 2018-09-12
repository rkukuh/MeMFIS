@extends('frontend.master')

@section('content')

<!-- BEGIN: Subheader -->
<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title m-subheader__title--separator">
        Customer
      </h3>
      <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
        <li class="m-nav__item m-nav__item--home">
          <a href="" class="m-nav__link m-nav__link--icon">
            <i class="m-nav__link-icon la la-home"></i>
          </a>
        </li>
        <li class="m-nav__separator">
          -
        </li>
        <li class="m-nav__item">
          <a href="/customer" class="m-nav__link">
            <span class="m-nav__link-text">
              Customer
            </span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END: Subheader -->
<div class="m-content">
  <div class="row">
    <div class="col-lg-12">
      <!--begin::Portlet-->
      <div class="m-portlet">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <span class="m-portlet__head-icon m--hide">
                <i class="la la-gear"></i>
              </span>
              <h3 class="m-portlet__head-text">
                Detail Customer
              </h3>
            </div>
          </div>
        </div>
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="myForm">                
          <div class="m-portlet__body">
            <div class="form-group m-form__group row">
              <div class="col-sm-6 col-md-6 col-lg-6">
                <label class="form-control-label">
                  Name :
                </label>
                <p>tes</p>
              </div>
            </div>
          </div>
          <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions--solid">
              <div class="row">
                <div class="col-lg-6">
                @component('frontend.common.buttons.back')
                            @slot('color', 'primary')
                            @slot('size', 'md')
                            @slot('href', '')
                @endcomponent

                <!-- <a class="btn btn-success" href="">
                Back to Pokemon
                </a> -->
                  
                </div>
              </div>
            </div>
          </div>
        </form>
        
        <!--end::Form-->
      </div>
      <!--end::Portlet-->
    </div>
  </div>
</div>

@endsection

<!-- @section('script')
<script src="{{ asset('js/ajax.js')}}"></script>
@endsection -->
@push('footer-scripts')

@endpush  