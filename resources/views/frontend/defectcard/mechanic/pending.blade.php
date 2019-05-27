@extends('frontend.master')

@section('content')

<div class="m-subheader hidden">
  <div class="d-flex align-items-center">
      <div class="mr-auto">
          <h3 class="m-subheader__title m-subheader__title--separator">            
            Defect Card
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
                  <a href="{{ route('frontend.defectcard.index') }}" class="m-nav__link">
                      <span class="m-nav__link-text">                              
                        Defect Card
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

                    @component('frontend.common.label.create-new')
                        @slot('text','pending')
                    @endcomponent

                    <h3 class="m-portlet__head-text">
                      Defect Card Form
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
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      Date
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', '2019-04-25 22:37:35')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      A/C Type
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      Discepancy Form
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      A/C Reg
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      JC No Refrence
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      A/C S/N
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      Sequence No 
                                  </label>
                                  @component('frontend.common.input.number')
                                    @slot('text', 'sequence')
                                    @slot('name', 'sequence')
                                    @slot('id_error', 'sequence')
                                    @slot('id', 'sequence')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-6 col-md-6 col-lg-6">
                                  <label class="form-control-label">
                                      Qty Mech
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                              <div class="col-sm-6 col-md-6 col-lg-6">
                                  <label class="form-control-label">
                                      Qty Engineer
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', 'generate')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  <label class="form-control-label">
                                      Skill
                                  </label>

                                  @component('frontend.common.input.select2')
                                        @slot('id', 'otr_certification')
                                        @slot('text', 'Skill')
                                        @slot('name', 'otr_certification')
                                        @slot('id_error', 'otr_certification')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-12 col-md-12 col-lg-12">
                                  @component('frontend.common.input.checkbox')
                                    @slot('id', 'is_rii')
                                    @slot('name', 'is_rii')
                                    @slot('text', 'RII?')
                                    @slot('style_div','margin-top:30px')
                                  @endcomponent 
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                          <div class="form-group m-form__group row">
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                  <label class="form-control-label">
                                      Area/Zone
                                  </label>

                                  @component('frontend.common.input.select2')
                                      @slot('id', 'zone')
                                      @slot('text', 'Zone')
                                      @slot('name', 'zone')
                                      @slot('id_error', 'zone')
                                  @endcomponent
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                  <label class="form-control-label">
                                      ATA
                                  </label>

                                  @component('frontend.common.input.text')
                                    @slot('text', 'ATA')
                                    @slot('name', 'ata')
                                  @endcomponent
                              </div>
                              <div class="col-sm-4 col-md-4 col-lg-4">
                                  <label class="form-control-label">
                                      Est. Mhrs @include('frontend.common.label.required')
                                  </label>

                                  @component('frontend.common.input.number')
                                      @slot('text', 'manhour')
                                      @slot('name', 'manhour')
                                      @slot('id_error', 'manhour')
                                      @slot('id', 'manhour')
                                  @endcomponent
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Complaint
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group m-form__group row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Remark
                                </label>

                                @component('frontend.common.label.data-info')
                                    @slot('text', 'generate')
                                @endcomponent
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
                      <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group m-form__group row">
                          <div class="col-sm-12 col-md-12 col-lg-12">
                            <label class="form-control-label">
                                Propose Correction
                            </label>
                          </div>
                        </div>
                        <div class="form-group m-form__group row">
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="m-checkbox-inline">
                                @component('frontend.testing.khusnul.checkbox-inline')
                                    @slot('name', '1')
                                    @slot('text','1. Remove')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '2')
                                        @slot('text','2. Install')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '3')
                                        @slot('text','3. Rectification')
                                @endcomponent
                            </div>
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="m-checkbox-inline">
                                @component('frontend.testing.khusnul.checkbox-inline')
                                    @slot('name', '4')
                                    @slot('text','4. Repair')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '5')
                                        @slot('text','5. Replace')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '6')
                                        @slot('text','6. Not')
                                @endcomponent
                            </div>
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="m-checkbox-inline">
                                @component('frontend.testing.khusnul.checkbox-inline')
                                    @slot('name', '7')
                                    @slot('text','7. Test')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '8')
                                        @slot('text','8. Shop Visit')
                                @endcomponent
                                @component('frontend.testing.khusnul.checkbox-inline')
                                        @slot('name', '9')
                                        @slot('text','9. Other')
                                @endcomponent
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
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
                                              Tool(s) List
                                          </h3>
                                      </div>
                                  </div>
                              </div>
                              <div class="m-portlet m-portlet--mobile">
                                  <div class="m-portlet__body">
                                      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                          <div class="row align-items-center">
                                              <div class="col-xl-8 order-2 order-xl-1">
                                                  <div class="form-group m-form__group row align-items-center">
                                                      <div class="col-md-4">
                                                          <div class="m-input-icon m-input-icon--left">
                                                              <input type="text" class="form-control m-input" placeholder="Search..."
                                                                  id="generalSearch">
                                                              <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                  <span><i class="la la-search"></i></span>
                                                              </span>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                  <div class="m-separator m-separator--dashed d-xl-none"></div>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="defectcard_tool_datatable" id="scrolling_both"></div>

                                      @include('frontend.purchase-order.modal-check')

                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="form-group m-form__group row">
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
                                            Material(s) List
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet m-portlet--mobile">
                                <div class="m-portlet__body">
                                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                        <div class="row align-items-center">
                                            <div class="col-xl-8 order-2 order-xl-1">
                                                <div class="form-group m-form__group row align-items-center">
                                                    <div class="col-md-4">
                                                        <div class="m-input-icon m-input-icon--left">
                                                            <input type="text" class="form-control m-input" placeholder="Search..."
                                                                id="generalSearch">
                                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                                <span><i class="la la-search"></i></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="defectcard_material_datatable" id="scrolling_both"></div>

                                    @include('frontend.purchase-order.modal-check')

                                </div>
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
                                      @slot('id', 'resume')
                                      @slot('class', 'resume')
                                      @slot('text','Resume')
                                      @slot('color','primary')
                                      @slot('icon','')
                                  @endcomponent

                                  @component('frontend.common.buttons.submit')
                                      @slot('type','button')
                                      @slot('id', 'closed')
                                      @slot('class', 'closed')
                                      @slot('text','Closed')
                                      @slot('color','primary')
                                      @slot('icon','')
                                  @endcomponent

                                  @component('frontend.common.buttons.back')
                                      @slot('href', route('frontend.receiving-inspection-report.index'))
                                  @endcomponent
                              </div>
                          </div>
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

@push('footer-scripts')
    <script src="{{ asset('js/frontend/defect-card/open.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/zone.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/zone.js')}}"></script>

    <script src="{{ asset('js/frontend/functions/select2/otr-certification.js')}}"></script>
    <script src="{{ asset('js/frontend/functions/fill-combobox/otr-certification.js')}}"></script>
@endpush