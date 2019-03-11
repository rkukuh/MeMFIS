@extends('frontend.master')

@section('content')
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
                          Heavy Maintenance Project
                      </h3>
                  </div>
              </div>
            </div>
            <div class="form-group m-form__group row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#" data-target="#m_tabs_taskcard">Taskcard List(s)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_tool_material">General Tool and Material</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_enginner">Engineer Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_manhour">Manhours Propotion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_facility">Facility Used</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_taskcard" role="tabpanel">
                        @include('frontend.project.hm.taskcard.index')
                    </div>
                    <div class="tab-pane" id="m_tabs_tool_material" role="tabpanel">
                        @include('frontend.project.hm.item.index')
                    </div>
                    <div class="tab-pane" id="m_tabs_enginner" role="tabpanel">
                        @include('frontend.project.hm.engineer.index')
                    </div>
                    <div class="tab-pane" id="m_tabs_manhour" role="tabpanel">
                        @include('frontend.project.hm.manhour.index')
                    </div>
                    <div class="tab-pane" id="m_tabs_facility" role="tabpanel">
                        @include('frontend.project.hm.facility.index')
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>


@endsection
