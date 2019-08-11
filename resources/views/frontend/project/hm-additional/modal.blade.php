<div class="modal fade" id="modal_addtional_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="left">
                <div class="form-group m-form__group row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        @component('frontend.common.input.select2')
                            @slot('id', 'project-additional')
                            @slot('text', 'project-additional')
                            @slot('name', 'project-additional')
                            @slot('id_error', 'project-additional')
                        @endcomponent
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="flex">
                    <div class="action-buttons">
                        @component('frontend.common.buttons.create-new')
                            @slot('text', 'Create Additional')
                            @slot('class', 'create')
                            @slot('color', 'success')
                            @slot('style', 'border-radius: 60px 60px 60px 60px')
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('footer-scripts')
    <script>
        $('.modal-footer').on('click', '.create', function () {
            let project_uuid =$('#project').val();
            window.location.href = 'project-hm-additional/create/'+project_uuid+'/';
        });
    </script>
@endpush
