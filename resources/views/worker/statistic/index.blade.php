@extends('worker.layouts.layout')


@section('title')
    Statistics
@endsection

@section('header')
    Statistic page
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Top 3 Teams:</h2>
                <div class="d-flex justify-content-between">
                    @if ($teams)
                        @foreach ($teams as $team)
                            <div class="col-md-3">
                                <div class="card bg-{{ $color[$i] }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <button class="btn btn-xl btn-{{ $color[$i] }} rounded-4">
                                                    {{ $i++ }}pl
                                                </button>
                                            </div>
                                            <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text font-extrabold">{{ $team->name }}</h6>
                                                <h6 class="font-semibold mb-0">Done tasks: {{ $team->tasks_count }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            @if ($deadline)
                <div class="col-md-3">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-secondary rounded-4">
                                        <i class="bi bi-calendar-x"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Deadline</h6>
                                    <h6 class="font-semibold mb-0">{{ $deadline->deadline }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($unfulfilled_tasks)
                <div class="col-md-3">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-secondary rounded-4">
                                        <i class="bi bi-ban"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Not Done tasks</h6>
                                    <h6 class="font-semibold mb-0">{{ $unfulfilled_tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($tasks)
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-info rounded-4">
                                        <i class="bi bi-list-task"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">All tasks count</h6>
                                    <h6 class="font-semibold mb-0">{{ $tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($done_tasks)
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-info rounded-4">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Done Tasks</h6>
                                    <h6 class="font-semibold mb-0">{{ $done_tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>




@endsection
