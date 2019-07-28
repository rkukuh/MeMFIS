<div class="px-4 pb-4">
    <div class="repeaterFacility">
        @if(isset($project_workpackage->facilities) && sizeof($project_workpackage->facilities) > 0)
            @foreach($project_workpackage->facilities as $facility)
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        @component('frontend.common.label.data-info')
                            @slot('text', $facility->facility->name)
                        @endcomponent
                    </div>
                </div>
            @endforeach
        @else
            <div class="repeaterRow">
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                       <label>No facilities has been selected</label>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>