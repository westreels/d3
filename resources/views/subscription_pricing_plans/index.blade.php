@extends('layouts.app')
@section('title')
    {{__('messages.subscription_plans.subscription_plans')}}
@endsection
@section('content')
    @include('flash::message')
    <div class="card">
        <div class="card-body p-lg-10">
            <div class="d-flex flex-column">
                @include('subscription_pricing_plans.pricing_plan_button')
                <div class="row">
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="monthContent" role="tabpanel" aria-labelledby="month-tab">
                                <div class="row justify-content-center">
                                    @forelse($subscriptionPricingMonthPlans as $subscriptionsPricingPlan)
                                        @include('subscription_pricing_plans.pricing_plan_section')
                                    @empty
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card text-center empty_featured_card">
                                                <div class="card-body d-flex align-items-center justify-content-center">
                                                    <div>
                                                        <div class="empty-featured-portfolio">
                                                            <i class="fas fa-question"></i>
                                                        </div>
                                                        <h3 class="card-title mt-3">
                                                            {{ __('Subscription Month Plan Not Found') }}
                                                        </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="tab-pane fade" id="yearContent" role="tabpanel"
                                 aria-labelledby="year-tab">
                                <div class="row justify-content-center">
                                    @forelse($subscriptionPricingYearPlans as $subscriptionsPricingPlan)
                                        @include('subscription_pricing_plans.pricing_plan_section')
                                    @empty
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card text-center empty_featured_card">
                                            <div class="card-body d-flex align-items-center justify-content-center">
                                                <div>
                                                    <div class="empty-featured-portfolio">
                                                        <i class="fas fa-question"></i>
                                                    </div>
                                                    <h3 class="card-title mt-3">
                                                        {{ __('Subscription Year Plan Not Found') }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        {{--let makePaymentURL = "{{ route('purchase-subscription') }}"--}}
        let subscribeText = "{{ __('choose plan') }}";
    </script>
    <script src="{{ mix('assets/js/subscriptions/admin-free-subscription.js') }}"></script>
@endsection
