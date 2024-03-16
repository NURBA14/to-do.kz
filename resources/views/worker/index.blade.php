@extends('worker.layouts.layout')

@section('title')
    Worker Home
@endsection

@section('header')
    <div class="d-flex justify-content-between">
        Worker Home
        @if ($last_tasks)
            <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                aria-controls="offcanvasRight">
                New Tasks <span class="badge bg-transparent">{{ $last_tasks->count() }}</span>
            </button>
        @endif
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="card text-start">
                    <div class="card-body">
                        <h4 class="card-title">{{ date('l') }}</h4>
                        <p class="card-text">{{ date('Y-F-d') }}</p>
                    </div>
                </div>
            </div>
            @if ($not_done_tasks)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">Not Done Tasks</h4>
                            <p class="card-text">{{ $not_done_tasks }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($in_process_tasks)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">In Process Tasks</h4>
                            <p class="card-text">{{ $in_process_tasks }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if ($done_tasks)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title">Done Tasks</h4>
                            <p class="card-text">{{ $done_tasks }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            @if ($progress)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Done Tasks </h4>
                            <h4>{{ $progress }}%</h4>
                        </div>
                        <div class="card-body">
                            <div class="progress progress-success progress-lg  mb-4">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>


        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">New Tasks</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @if ($last_tasks)
                    @foreach ($last_tasks as $task)
                        <div class="toast show mb-3 shadow" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">{{ $task->name }}</strong>
                                <small>{{ $task->deadline }}</small>
                                <button type="button" class="btn-close" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                {{ $task->text }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
@endsection
