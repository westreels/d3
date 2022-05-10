@extends('layouts.app')
@section('title')
    {{ __('messages.enquiries')}}
@endsection
@section('content')
    <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
            <div class="row">
                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            <div class="p-12">
                @include('super_admin.enquiries.show_fields')
            </div>
        </div>
    </div>
@endsection
