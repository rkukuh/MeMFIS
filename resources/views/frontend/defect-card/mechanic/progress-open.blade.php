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
        <div class="col-lg-7">
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <span class="m-portlet__head-icon m--hide">
                                <i class="la la-gear"></i>
                            </span>

                            @component('frontend.common.label.create-new')
                                @slot('text','open')
                            @endcomponent

                            <h3 class="m-portlet__head-text">
                            Defect Card Form
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Date
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->created_at)
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        A/C Type
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->quotation->project->aircraft->name)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Discrepenct No
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->code)
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        A/C Reg
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->quotation->project->aircraft_register)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        JC No Refference
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->number)
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        A/C S/N
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->quotation->project->aircraft_sn)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Sequence No
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->taskcard->sequence)
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Qty Engineer
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->engineer_quantity)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        ATA
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Generated')
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Qty Mech
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->helper_quantity)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Area/Zone
                                    </label>

                                    @if (isset($defectcard->jobcard->taskcard->workarea->name))
                                        @component('frontend.common.label.data-info')
                                            @slot('text', $defectcard->jobcard->taskcard->workarea->name)
                                        @endcomponent
                                    @else
                                        @component('frontend.common.label.data-info')
                                            @slot('text', '')
                                        @endcomponent
                                    @endif
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Est. Mhrs
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text',  $defectcard->estimation_manhour)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        Skill
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->jobcard->taskcard->skill->name)
                                    @endcomponent
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label class="form-control-label">
                                        RII
                                    </label>

                                    @component('frontend.common.input.checkbox')
                                        @slot('id', 'is_rii')
                                        @slot('name', 'is_rii')
                                        @slot('text', 'IS RII?')
                                        @slot('disabled','disabled')
                                        @if($defectcard->is_rii == 1)
                                            @slot('checked','checked')
                                        @else

                                        @endif
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Complaint @include('frontend.common.label.optional')
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', $defectcard->complaint)
                                    @endcomponent
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <label class="form-control-label">
                                        Remark @include('frontend.common.label.optional')
                                    </label>

                                    @component('frontend.common.label.data-info')
                                        @slot('text', 'Generated')
                                    @endcomponent
                                </div>
                            </div>
                            <fieldset class="border p-2">
                                <legend class="w-auto">Propose Correction</legend>

                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'remove')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'remove')
                                            @slot('text', '1. REMOVE')
                                            @slot('size', '12')
                                            @slot('disabled','disabled')
                                            @if(in_array('remove',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'repair')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'repair')
                                            @slot('text', '4. REPAIR')
                                            @slot('disabled','disabled')
                                            @if(in_array('repair',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'test')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'test')
                                            @slot('text', '7. TEST')
                                            @slot('disabled','disabled')
                                            @if(in_array('test',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'install')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'install')
                                            @slot('text', '2. INSTALL')
                                            @slot('disabled','disabled')
                                            @if(in_array('install',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'replace')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'replace')
                                            @slot('text', '5. REPLACE')
                                            @slot('disabled','disabled')
                                            @if(in_array('replace',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'shop_visit')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'shop-visit')
                                            @slot('text', '8. SHOP VISIT')
                                            @slot('disabled','disabled')
                                            @if(in_array('shop-visit',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                </div>
                                <div class="form-group m-form__group row">
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'rectification')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'rectification')
                                            @slot('text', '3. RECTIFICATION')
                                            @slot('disabled','disabled')
                                            @if(in_array('rectification',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        @component('frontend.common.input.checkbox')
                                            @slot('id', 'ndt')
                                            @slot('name', 'propose[]')
                                            @slot('value', 'ndt')
                                            @slot('text', '6. NDT')
                                            @slot('disabled','disabled')
                                            @if(in_array('ndt',$propose_corrections))
                                                @slot('checked', 'checked')
                                            @endif
                                            @slot('size', '12')
                                        @endcomponent
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-6">
                                                @component('frontend.common.input.checkbox')
                                                    @slot('id', 'other')
                                                    @slot('name', 'propose[]')
                                                    @slot('value', 'other')
                                                    @slot('text', '9. Other')
                                                    @slot('disabled','disabled')
                                                    @if(in_array('other',$propose_corrections))
                                                        @slot('checked', 'checked')
                                                    @endif
                                                    @slot('size', '12')
                                                @endcomponent
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                @component('frontend.common.input.textarea')
                                                    @slot('id', 'other_text')
                                                    @slot('text', 'other_text')
                                                    @slot('name', 'other_text')
                                                    @if(empty($propose_correction_text))
                                                        @slot('disabled','disabled')
                                                    @endif
                                                    @slot('value', $propose_correction_text)
                                                    @slot('rows', '3')
                                                    @slot('id_error', 'other_text')
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group m-form__group row">
                                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                                    <div class="flex">
                                        <div class="action-buttons">
                                            <form method="POST" action="{{route('frontend.defectcard-mechanic.update',$defectcard->uuid)}}">
                                                {{method_field('PATCH')}}
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="progress" value="{{$status->uuid}}">
                                                @include('frontend.common.buttons.execute')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
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
                                <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                    <div class="defectcard_tool_datatable" id="scrolling_both"></div>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tools_datatable" id="scrolling_both"></div>
                    </div>
                </div>
            </div>
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
                                <div class="col-xl-12 order-12 order-xl-12 m--align-right">
                                        <div class="defectcard_material_datatable" id="scrolling_both"></div>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        <div class="materials_datatable" id="scrolling_both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('footer-scripts')
    <script>
        let uuid = '{{$defectcard->uuid}}';
   </script>
    <script src="{{ asset('js/frontend/defect-card/items.js')}}"></script>
@endpush

