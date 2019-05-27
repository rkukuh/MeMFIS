<div class="modal fade" id="modal_tool"  role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                @include('frontend.common.label.create-new')

                <h5 class="modal-title" id="TitleModalMinMaxStock">
                    Item

                    <small id="item-storage" class="m--font-focus"></small>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="MinMaxStockForm">
                    <input type="hidden" class="form-control form-control-danger m-input" name="id" id="id">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row item-info">
                          <div class="col-sm-12 col-md-12 col-lg-12">
                              <label class="form-control-label">
                                  Item
                              </label>
                              @component('frontend.common.input.select2')
                                  @slot('text', 'Item')
                                  @slot('id_error', 'item')
                                  @slot('id', 'item')
                                  @slot('name', 'item')
                              @endcomponent
                          </div>
                        </div>
                        <div class="form-group m-form__group row item-info">
                          <div class="col-sm-3 col-md-3 col-lg-3">
                              <label class="form-control-label">
                                  Qty
                              </label>
                              @component('frontend.common.input.number')
                                @slot('text', 'PPN')
                                @slot('id', 'ppn_amount')
                                @slot('name', 'ppn_amount')
                                @slot('id_error', 'ppn_amount')
                              @endcomponent
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3">
                              <label class="form-control-label">
                                  Unit
                              </label>
                              @component('frontend.common.input.select2')
                                @slot('text', 'Unit')
                                @slot('id_error', 'unit_tool')
                                @slot('id', 'unit_tool')
                                @slot('name', 'unit_tool')
                              @endcomponent
                          </div>
                          <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  IPC Ref.
                              </label>
                              @component('frontend.common.input.text')
                                @slot('text', 'IPC Ref.')
                                @slot('name', 'ipc')
                              @endcomponent
                          </div>
                        </div>
                        <div class="form-group m-form__group row item-info">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  S/N On
                              </label>
                              @component('frontend.common.input.text')
                                @slot('text', 'IPC Ref.')
                                @slot('name', 'ipc')
                              @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  S/N Off
                              </label>
                              @component('frontend.common.input.text')
                                @slot('text', 'IPC Ref.')
                                @slot('name', 'ipc')
                              @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-stock')
                                    @slot('type', 'button')
                                @endcomponent

                                @component('frontend.common.buttons.reset')
                                    @slot('class', 'reset-storage')
                                @endcomponent

                                @include('frontend.common.buttons.close')
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
