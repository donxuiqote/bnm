@extends('layouts.dashboard')
@section('content')

<div class="grid grid-cols-12 gap-4 md:gap-6">

    <div class="col-span-12 space-y-6 xl:col-span-7">

        @include('user.partials.metric-group.metric-group-01')

        @include('user.partials.chart.chart-01')
    </div>

    <div class="col-span-12 xl:col-span-5">
        @include('user.partials.chart.chart-02')
    </div>

    <div class="col-span-12">
        @include('user.partials.chart.chart-03')
    </div>

    <div class="col-span-12 xl:col-span-5">
        @include('user.partials.map-01')
    </div>


</div>

@endsection