<div class="modal fade" id="modal_cmr_awl" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TitleModalCmrAwl">CMR/AWL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="cmrawl_datatable">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="modal-footer">
                    <div class="flex">
                        <div class="action-buttons">
                            <div class="flex">
                                <div class="action-buttons">
                                    @component('frontend.common.buttons.close')
                                        @slot('text', 'Close')
                                    @endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
