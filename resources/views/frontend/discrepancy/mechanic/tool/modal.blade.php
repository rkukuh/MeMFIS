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
                    <input type="hidden" class="form-control form-control-danger m-input" name="uuid" id="uuid">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row item-info">
                          <div class="col-sm-12 col-md-12 col-lg-12">
                              <label class="form-control-label">
                                  Tool
                              </label>
                              @component('frontend.common.input.select2')
                                  @slot('text', 'Tool')
                                  @slot('id_error', 'tool')
                                  @slot('id', 'tool')
                                  @slot('name', 'tool')
                              @endcomponent
                          </div>
                        </div>
                        <div class="form-group m-form__group row item-info">
                          <div class="col-sm-3 col-md-3 col-lg-3">
                              <label class="form-control-label">
                                  Qty
                              </label>
                              @component('frontend.common.input.number')
                                @slot('text', 'Quantity')
                                @slot('id', 'quantity')
                                @slot('name', 'quantity')
                                @slot('id_error', 'quantity')
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
                                @slot('id', 'ipc')
                              @endcomponent
                          </div>
                        </div>
                        <div class="form-group m-form__group row item-info">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  S/N On
                              </label>
                              @component('frontend.common.input.text')
                                @slot('text', 'S/N On')
                                @slot('name', 'sn_on')
                                @slot('id', 'sn_on')
                              @endcomponent
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  S/N Off
                              </label>
                              @component('frontend.common.input.text')
                                @slot('text', 'S/N Off.')
                                @slot('name', 'sn_off')
                                @slot('id', 'sn_off')
                              @endcomponent
                            </div>
                        </div>
                        <div class="form-group m-form__group row item-info">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                              <label class="form-control-label">
                                  Remark
                              </label>
                              @component('frontend.common.input.textarea')
                                @slot('text', 'Remark')
                                @slot('name', 'remark')
                                @slot('rows', '3')
                                @slot('id', 'remark')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="flex">
                            <div class="action-buttons">
                                @component('frontend.common.buttons.submit')
                                    @slot('class', 'add-tool')
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
