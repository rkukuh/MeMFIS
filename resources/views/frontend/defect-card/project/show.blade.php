@extends('frontend.master')

@section('content')
<div class="m-subheader hidden">
  <div class="d-flex align-items-center">
      <div class="mr-auto">
          <h3 class="m-subheader__title m-subheader__title--separator">
              Defect Card Project
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
                  <a href="{{ route('frontend.customer.index') }}" class="m-nav__link">
                      <span class="m-nav__link-text">
                          Defect Card Project
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
                              @slot('text','Summary Report')
                          @endcomponent

                          <h3 class="m-portlet__head-text">
                              Defect Card Summary
                          </h3>
                      </div>
                  </div>
              </div>
              <div class="m-portlet m-portlet--mobile">
                  <div class="m-portlet__body">
                      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                          <div class="form-group m-form__group row align-items-center">
                              <div class="col-sm-6 col-md-6 col-lg-6">
                                  <label class="form-control-label">
                                      Project Title
                                  </label>

                                  @component('frontend.common.label.data-info')
                                      @slot('text', $project->title)
                                  @endcomponent
                              </div>
                          </div>

                      </div>
                      {{-- <div class="test_datatable" id="scrolling_both"></div> --}}
                      <table border="1px" width="100%">
                            <tr style="text-align:center;background-color:beige;padding:10px;font-weight:bold">
                                <td>
                                    Date
                                </td>
                                <td>
                                    Project No
                                </td>
                                <td>
                                    Workorder No
                                </td>
                                <td>
                                    A/C Type
                                </td>
                                <td>
                                    A/C Reg
                                </td>
                                <td>
                                    A/C Serial
                                </td>
                                <td>
                                    Status
                                </td>
                            </tr>
                            <tr>
                                <td height="20px" style="text-align:center">
                                    {{$project->created_at}}
                                </td>
                                <td height="20px" style="text-align:center">
                                    {{$project->code}}
                                </td>
                                <td height="20px" style="text-align:center">
                                    {{$project->no_wo}}
                                </td>
                                <td height="20px" style="text-align:center">
                                    {{$project->aircraft->name}}
                                </td>
                                <td height="20px" style="text-align:center">
                                    {{$project->aircraft_register}}
                                </td>
                                <td height="20px" style="text-align:center">
                                    {{$project->aircraft_sn}}
                                </td>
                                <td height="20px" style="text-align:center">
                                </td>
                            </tr>
                        </table>
                      <hr>
                      <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                          <div class="form-group m-form__group row align-items-center">
                              <div class="col-sm-6 col-md-6 col-lg-6"></div>
                          </div>
                          <div class="form-group m-form__group row align-items-center">
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
                          </div>
                      </div>
                      <div class="defectcard_datatable" id="scrolling_both"></div>
                      <div class="form-group m-form__group row">
                        <div class="col-sm-12 col-md-12 col-lg-12 footer">
                            <div class="flex">
                                <div class="action-buttons">
                                    @component('frontend.common.buttons.submit')
                                        @slot('type','button')
                                        @slot('id', 'print')
                                        @slot('class', 'print')
                                        @slot('text','Print Summary')
                                        @slot('icon','fa-print')
                                    @endcomponent

                                    @include('frontend.common.buttons.back')

                                </div>
                            </div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection


@push('footer-scripts')
  <script>
        let project_uuid ='{{$project->uuid}}';
    </script>
  <script src="{{ asset('js/frontend/defect-card/project/show.js')}}"></script>
@endpush
