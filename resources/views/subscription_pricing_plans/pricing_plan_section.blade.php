<div class="col-xl-4 my-4">
    <div class="d-flex h-100">
        <div class="w-100 d-flex flex-column flex-center rounded-3 bg-light bg-opacity-75 py-15 px-10">
            <div class="mb-7 text-center">
                <h1 class="text-dark mb-5 fw-boldest text-capitalize">{{ $subscriptionsPricingPlan->name }}</h1>
                <div class="text-center">
                    <span class="mb-2 text-primary">{{ getSubscriptionPlanCurrencyIcon($subscriptionsPricingPlan->currency) }}</span>
                    <span class="fs-3x fw-bolder text-primary" data-kt-plan-price-month="39"
                          data-kt-plan-price-annual="399">{{ number_format($subscriptionsPricingPlan->price) }}</span>
                    <span class="fs-7 fw-bold opacity-50">/{{ \App\Models\SubscriptionPlan::PLAN_TYPE[$subscriptionsPricingPlan->frequency] }}</span>
                </div>
                <div class="pricing-card__data mt-5">
                    <ul class="pl-0 list-style-none">
                        @if (isAuth() && count($subscriptionsPricingPlan->subscription) > 0)
                            @php
                                $activeSubscription = currentActiveSubscription();
                            @endphp
                            @if($activeSubscription && $activeSubscription->trial_ends_at != null && $activeSubscription->subscription_plan_id == $subscriptionsPricingPlan->id)
                                <li>
                                    <h4>{{ __('messages.subscription_plans.valid_until') }}
                                        : {{ $subscriptionsPricingPlan->trial_days }}
                                    </h4>
                                </li>
                            @endif
                            @if(Auth::user()->hasRole('admin'))
                                @if($activeSubscription && isAuth() &&  $activeSubscription->subscriptionPlan->id == $subscriptionsPricingPlan->id)
                                    <li>
                                        <h4>
                                            {{ __('messages.subscription_plans.end_date') }}
                                            :
                                            {{ getParseDate($activeSubscription->end_date)->format('d-m-Y') }}
                                        </h4>
                                    </li>
                                @endif
                            @endif
                        @endif
                    </ul>
                </div>

            </div>

            @php
                $currentActiveSubscription = currentActiveSubscription();
            @endphp

            @if($currentActiveSubscription && $subscriptionsPricingPlan->id == $currentActiveSubscription->subscription_plan_id && !$currentActiveSubscription->isExpired())
                @if($subscriptionsPricingPlan->price != 0)
                    <button type="button"
                            class="btn btn-success text-capitalize rounded-pill mx-auto d-block cursor-remove-plan pricing-plan-button-active"
                            data-id="{{ $subscriptionsPricingPlan->id }}">
                        {{ __('currently active') }}</button>
                @else
                    <button type="button" class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                        {{ __('Free Plan cannot be renewed/chosen again') }}
                    </button>
                @endif
            @else
                @if($currentActiveSubscription && !$currentActiveSubscription->isExpired() && ($subscriptionsPricingPlan->price == 0 || $subscriptionsPricingPlan->price != 0))
                    @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                        <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', $subscriptionsPricingPlan->id) : 'javascript:void(0)' }}"
                           class="btn btn-primary text-capitalize rounded-pill mx-auto d-block {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                           data-id="{{ $subscriptionsPricingPlan->id }}"
                           data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                            {{ __('switch plan') }}</a>
                    @else
                        <button type="button" class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                            {{ __('Free Plan cannot be renewed/chosen again') }}
                        </button>
                    @endif
                @else
                    @if($subscriptionsPricingPlan->hasZeroPlan->count() == 0)
                        <a href="{{ $subscriptionsPricingPlan->price != 0 ? route('choose.payment.type', $subscriptionsPricingPlan->id) : 'javascript:void(0)' }}"
                           class="btn btn-primary text-capitalize rounded-pill mx-auto d-block {{ $subscriptionsPricingPlan->price == 0 ? 'freePayment' : ''}}"
                           data-id="{{ $subscriptionsPricingPlan->id }}"
                           data-plan-price="{{ $subscriptionsPricingPlan->price }}">
                            {{ __('choose plan') }}</a>
                    @else
                        <button type="button" class="btn btn-info rounded-pill mx-auto d-block cursor-remove-plan">
                            {{ __('Free Plan cannot be renewed/chosen again') }}
                        </button>
                    @endif
                @endif
            @endif

        </div>
    </div>
</div>
