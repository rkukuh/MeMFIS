<div class='repeater'>
    <div data-repeater-list="group-facility">
        <div data-repeater-item>
            <div class="form-group m-form__group row">
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <select id="type_facility" name="type_facility" class="form-control project"  onchange="myFunction(this)">
                        <option value="">
                            Select a Facility
                        </option>
                        <option value="1">Facility A</option>
                        <option value="2">Facility B</option>
                        <option value="3">Facility C</option>
                        <option value="4">Facility D</option>
                        <option value="5">Facility E</option>
                        <option value="6">Facility F</option>
                    </select>
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    @include('frontend.common.buttons.create_repeater')
                </div>
                <div class="col-sm-1 col-md-1 col-lg-1">
                    @include('frontend.common.buttons.delete_repeater')
                </div>
            </div>
        </div>
    </div>
</div>
