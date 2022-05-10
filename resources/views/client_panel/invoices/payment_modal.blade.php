<div id="paymentModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{ __('messages.payment.add_payment') }}</h2>
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                             version="1.1">
							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                               fill="#000000">
								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
								<rect fill="#000000" opacity="0.5"
                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                      x="0" y="7" width="16" height="2" rx="1"/>
							</g>
						</svg>
					</span>
                </button>
            </div>
            {{ Form::open(['id'=>'paymentForm']) }}
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="alert alert-danger display-none hide" id="editValidationErrorsBox"></div>
                {{ Form::hidden('invoice_id',null,['id'=>'invoice_id']) }}
                <div class="row">
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('payable_amount',__('messages.payment.payable_amount').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        <div class="input-group mb-5">
                            {{ Form::text('payable_amount', null, ['id'=>'payable_amount','class' => 'form-control form-control-solid','readonly']) }}
                            <a class="input-group-text border-0 cursor-default" href="javascript:void(0)">
                                <span>{{ getCurrencySymbol() }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('payment_type',__('messages.payment.payment_type').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('payment_type', $paymentType, null,['id'=>'payment_type','class' => 'form-select form-select-solid','placeholder'=>'Select Payment Type','required']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5 amount">
                        {{ Form::label('amount',__('messages.invoice.amount').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::number('amount', null, ['id'=>'amount','class' => 'form-control form-control-solid','step'=>'any','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '')",'required']) }}
                        <span id="error-msg" class="text-danger"></span>
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        {{ Form::label('payment_mode',__('messages.payment.payment_mode').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::select('payment_mode',$paymentMode, null,['id'=>'payment_mode','class' => 'form-select form-select-solid','placeholder'=>'Select Payment Mode','required']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5" id="transaction">
                        {{ Form::label('transactionId',__('messages.payment.transaction_id').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::text('transaction_id', null, ['id'=>'transactionId','class' => 'form-control form-control-solid']) }}
                    </div>
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('notes',__('messages.invoice.note').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('notes', null, ['id'=>'payment_note','class' => 'form-control form-control-solid','rows'=>'5','required']) }}
                    </div>

                </div>
                <div class="text-right mt-5">
                    {{ Form::button(__('messages.common.pay'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'btnPay','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing...", 'data-new-text' => __('messages.common.pay')]) }}
                    <button type="button" class="btn btn-light btn-active-light-primary me-2"
                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
