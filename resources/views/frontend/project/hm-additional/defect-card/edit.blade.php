
<div class="form-group m-form__group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__body">

                <div class="defect_card_datatable_actual" id="defect_card_datatable_actual"></div>

                <div class="d-flex justify-content-end my-5">
                    @component('frontend.common.buttons.submit')
                        @slot('type','button')
                        @slot('id', 'delete-defect-card')
                        @slot('text', 'Delete DefectCard')
                        @slot('class', 'delete-project-additional')
                        @slot('icon', 'fa-trash')
                        @slot('color', 'danger')
                    @endcomponent
                </div>

                <div class="defect_card_datatable" id="defect_card_datatable"></div>


                <div class="d-flex justify-content-end my-5">
                    @component('frontend.common.buttons.submit')
                        @slot('type','button')
                        @slot('id', 'add-defect-card')
                        @slot('text', 'Add DefectCard')
                        @slot('class', 'add-project-additional')
                        @slot('icon', 'fa-plus')
                    @endcomponent
                </div>

                <div class="modal fade" id="m_modal_fetch_id_server"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-height="200">
                                    <ul class="m_datatable_selected_ids"></ul>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
