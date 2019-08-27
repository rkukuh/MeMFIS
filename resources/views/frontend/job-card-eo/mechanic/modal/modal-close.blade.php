<div class="modal fade" id="modal_close" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TitleModalWorkpackage">Close</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST" action="{{route('frontend.jobcard-eo-mechanic.update',$jobcard->uuid)}}" id="WorkpackageForm">
                    {{method_field('PATCH')}}
                    {!! csrf_field() !!}
                    <input type="hidden" name="progress" value="{{$closed->uuid}}">

                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    Accomplishment Notes: @include('frontend.common.label.required')
                                </label>
                                <input type="hidden" id="accomplishment" name="accomplishment" value="{{$accomplished}}">
                                @component('frontend.common.input.textarea')
                                    @slot('rows', '3')
                                    @slot('id', 'note')
                                    @slot('name', 'note')
                                    @slot('text', 'Note')
                                    @slot('required', 'required')
                                @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row ">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label class="form-control-label">
                                    @if(sizeOf($jobcard->defectcards) == 0)
                                        <i>none</i>
                                    @else
                                    @foreach($jobcard->defectcards as $defectCard )
                                        {{ $defectCard->code }}
                                    @endforeach
                                    @endif
                                </label>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @include('frontend.common.buttons.submit')

                                @include('frontend.common.buttons.reset')

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
