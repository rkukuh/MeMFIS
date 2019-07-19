@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
  <div class="d-flex align-items-center">
      <div class="mr-auto">
          <h3 class="m-subheader__title m-subheader__title--separator">
            Material Interchange
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
                  <a href="{{ route('frontend.quotation.index') }}" class="m-nav__link">
                      <span class="m-nav__link-text">
                        Material Interchange
                      </span>
                  </a>
              </li>
          </ul>
      </div>
  </div>
</div>
<div class="m-content">
  <div class="row">
      <div class="col-lg-12">
          <div class="m-portlet">
              <div class="m-portlet__head">
                  <div class="m-portlet__head-caption">
                      <div class="m-portlet__head-title">
                          <span class="m-portlet__head-icon m--hide">
                              <i class="la la-gear"></i>
                          </span>

                          @include('frontend.common.label.create-new')

                          <h3 class="m-portlet__head-text">
                              Material Interchange
                          </h3>
                      </div>
                  </div>
              </div>
              <div class="m-portlet m-portlet--mobile">
                  <div class="m-portlet__body">
                      <form id="itemform" name="itemform">
                          <div class="m-portlet__body">
                              <div class="form-group m-form__group row">
                                  <div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="form-group m-form__group row">
                                          <div class="col-sm-3 col-md-3 col-lg-3">
                                              <label class="form-control-label">
                                                  Part Number
                                              </label>
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                              @component('frontend.common.interchange.index')
                                                  @slot('id', '')
                                                  @slot('name', '')
                                                  @slot('text', 'Search Part Number')
                                                  @slot('margintop', '0')
                                              @endcomponent
                                              @component('frontend.common.input.hidden')
                                                  @slot('id', '')
                                                  @slot('name', '')
                                              @endcomponent
                                          </div>
                                      </div>
                                      <div class="form-group m-form__group row mt-4">
                                          <div class="col-sm-3 col-md-3 col-lg-3">
                                              <label class="form-control-label">
                                                Item Description
                                              </label>
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                              @component('frontend.common.input.textarea')
                                                  @slot('id', 'description')
                                                  @slot('text', 'Description')
                                                  @slot('name', 'description')
                                                  @slot('rows', '5')
                                                  @slot('id_error', 'description')
                                              @endcomponent
                                          </div>
                                      </div>
                                      <hr>
                                      <div class="form-group m-form__group row">
                                          <div class="col-sm-3 col-md-3 col-lg-3">
                                              <label class="form-control-label">
                                                  Interchange With Part Number
                                              </label>
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                              @component('frontend.common.interchange.index')
                                                  @slot('id', '')
                                                  @slot('name', '')
                                                  @slot('text', 'Search Part Number')
                                                  @slot('margintop', '0')
                                              @endcomponent
                                              @component('frontend.common.input.hidden')
                                                  @slot('id', '')
                                                  @slot('name', '')
                                              @endcomponent
                                          </div>
                                      </div>
                                      <div class="form-group m-form__group row mt-4">
                                          <div class="col-sm-3 col-md-3 col-lg-3">
                                              <label class="form-control-label">
                                                  Item Description
                                              </label>
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                              @component('frontend.common.input.textarea')
                                                  @slot('id', 'description')
                                                  @slot('text', 'Description')
                                                  @slot('name', 'description')
                                                  @slot('rows', '5')
                                                  @slot('id_error', 'description')
                                              @endcomponent
                                          </div>
                                      </div>
                                      <div class="form-group m-form__group row">
                                          <div class="col-sm-3 col-md-3 col-lg-3">
                                          </div>
                                          <div class="col-sm-6 col-md-6 col-lg-6">
                                            @component('frontend.common.input.checkbox')
                                                @slot('id', 'is_stock')
                                                @slot('name', 'is_stock')
                                                @slot('size','12')
                                                @slot('text', '2-Way Interchange')
                                            @endcomponent
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group m-form__group row">
                                  <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                      <div class="flex">
                                          <div class="action-buttons">
                                              @component('frontend.common.buttons.submit')
                                                  @slot('type','button')
                                                  @slot('id', 'add-interchange')
                                                  @slot('class', 'add-interchange')
                                              @endcomponent

                                              @include('frontend.common.buttons.reset')

                                              @include('frontend.common.buttons.back')

                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
