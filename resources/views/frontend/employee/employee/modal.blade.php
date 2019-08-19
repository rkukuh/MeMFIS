<div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">   
                
                @component('frontend.common.label.create-new')
                    @slot('icon','la la-cloud-upload')
                    @slot('text','Upload')
                @endcomponent

                <h5 class="modal-title" id="exampleModalLongTitle">Upload Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="left">
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label class="form-control-label text-primary">
                            Recommended size is 256 x 256 pixels
                        </label>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                       
                        <div class="image-upload">
                            <label for="file-input-1">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-1" type="file" class="file-upload"/>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                        
                        <div class="image-upload">
                            <label for="file-input-2">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-2" type="file" class="file-upload"/>
                        </div>
                            
                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                        
                        <div class="image-upload">
                            <label for="file-input-3">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-3" type="file" class="file-upload"/>
                        </div>

                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRjVXybwwswQWwuHWko_d8yyrqqLOYBqlGWkkKNs-yDqqrb2YuQ" alt="..." style="width: 256px; height:256px;position:relative;">
                       
                        <div class="image-upload">
                            <label for="file-input-4">
                                <i class="la la-edit" style="font-size:32px;"></i>
                            </label>
                            <input id="file-input-4" type="file" class="file-upload"/>
                        </div>

                        <div class="d-flex justify-content-center">
                            @component('frontend.common.input.radio')
                                @slot('id', 'profile')
                                @slot('name', 'profile')
                                @slot('text', 'Set As Profile')
                            @endcomponent
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group m-form__group row pr-3">
                <div class="col-sm-12 col-md-12 col-lg-12 footer">
                    <div class="flex">
                        <div class="action-buttons">
                            @component('frontend.common.buttons.submit')
                                @slot('type','button')
                                @slot('id', 'add-account')
                                @slot('class', 'add-account')
                            @endcomponent
            
                            @include('frontend.common.buttons.reset')
            
                            @include('frontend.common.buttons.close')
            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('header-scripts')
    <style>
    @media (min-width: 992px){
        .modal-lg {
            max-width: 1300px;
        }
    }
    .image-upload{
        position:absolute;
        top:0;
        right:60px;
    }

    .image-upload label{
        cursor: pointer;
    }

    .image-upload .file-upload {
        display: none;
    }
    </style>
@endpush