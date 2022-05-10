<div class="modal fade" tabindex="-1" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{__('messages.faqs.add_faq')}}</h2>

                <!--begin::Close-->
                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"
                        data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
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
                <!--end::Close-->
            </div>

            {{ Form::open(['id'=>'addNewForm','files' => true]) }}
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                    <div class="row">
                        <input type="hidden" id="faqsId">
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('question', __('messages.faqs.question').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            {{ Form::text('question', null, ['class' => 'form-control form-control-solid','required','placeholder' => 'Enter Question']) }}
                        </div>
                        <div class="form-group col-sm-12 mb-5">
                            {{ Form::label('answer', __('messages.faqs.answer').(':'), ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                            {{ Form::textarea('answer', null, ['class' => 'form-control form-control-solid','required', 'rows' => 6,'placeholder' => 'Enter Answer']) }}
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-3','id' => 'btnSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                        <button type="button" class="btn btn-light btn-active-light-primary me-2"
                                data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
                    </div>
                </div>
                {{ Form::close() }}
        </div>
    </div>
</div>
