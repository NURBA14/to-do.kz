@extends('admin.layouts.layout')

@section('title')
    Admin Home
@endsection


@section('header')
    <div class="d-flex justify-content-between">
        Admin Home page
    </div>
@endsection


@section('content')
    @include('admin.layouts.success')
    <div class="container">
        @if ($best_teams)
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Top 3 Teams:</h2>
                    <div class="d-flex justify-content-between">
                        @foreach ($best_teams as $team)
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
                    </div>
                    <hr>
                </div>
            </div>
        @endif

        @if ($progress)
            <div class="row">
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
            </div>
        @endif

        @if ($progress_workers)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Percentage of workers from all users</h4>
                            <h4>{{ $progress_workers }}%</h4>
                        </div>
                        <div class="card-body">
                            <div class="progress progress-success progress-lg  mb-4">
                                <div class="progress-bar" role="progressbar" style="width: {{ $progress_workers }}%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @if ($all_teams and $done_tasks and $not_done_tasks)
                <div class="col-md-6">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Teams Progress
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach ($all_teams as $team)
                                        <tr>
                                            <td class="col-3">{{ $team->name }}</td>
                                            <td class="col-6">
                                                <div class="progress progress-info">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ ($team->tasks_count / ($not_done_tasks + $done_tasks)) * 100 }}%"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="col-3 text-center">
                                                {{ ($team->tasks_count / ($not_done_tasks + $done_tasks)) * 100 }}%
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if ($all_teams_users and $workers)
                <div class="col-md-6">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Workers
                            </h4>
                        </div>
                        <div class="card-body px-0 py-1">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach ($all_teams_users as $team)
                                        <tr>
                                            <td class="col-3">{{ $team->name }}</td>
                                            <td class="col-6">
                                                <div class="progress progress-info">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: {{ $team->users_count }}%" aria-valuenow="0"
                                                        aria-valuemin="0" aria-valuemax="{{ $workers }}"></div>
                                                </div>
                                            </td>
                                            <td class="col-3 text-center">
                                                {{ $team->users_count }} / {{ $workers }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <h4>Tasks:</h4>
        <div class="row">
            @if ($done_tasks)
                <div class="col-md-3">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
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

            @if ($in_process_tasks)
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-clock-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">In process Task</h6>
                                    <h6 class="font-semibold mb-0">{{ $in_process_tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($not_done_tasks)
                <div class="col-md-3">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Not done Tasks</h6>
                                    <h6 class="font-semibold mb-0">{{ $not_done_tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($not_active_tasks)
                <div class="col-md-3">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-ban"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Not Active Tasks</h6>
                                    <h6 class="font-semibold mb-0">{{ $not_active_tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <h4>Users:</h4>
        <div class="row">
            @if ($workers)
                <div class="col-md-3">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-fill-gear"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Workers</h6>
                                    <h6 class="font-semibold mb-0">{{ $workers }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($admins)
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-fill-lock"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Admins</h6>
                                    <h6 class="font-semibold mb-0">{{ $admins }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($ban_workers)
                <div class="col-md-3">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-fill-slash"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Ban-workers</h6>
                                    <h6 class="font-semibold mb-0">{{ $ban_workers }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($users)
                <div class="col-md-3">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Users</h6>
                                    <h6 class="font-semibold mb-0">{{ $users }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <h4>Organization:</h4>
        <div class="row">
            @if ($teams)
                <div class="col-md-3">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-people-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Teams</h6>
                                    <h6 class="font-semibold mb-0">{{ $teams }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($professions)
                <div class="col-md-3">
                    <div class="card bg-info">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-badge-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Profession</h6>
                                    <h6 class="font-semibold mb-0">{{ $professions }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($ranks)
                <div class="col-md-3">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-person-vcard-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">Ranks</h6>
                                    <h6 class="font-semibold mb-0">{{ $ranks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($ban_workers and $users and $workers)
                <div class="col-md-3">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <button class="btn btn-xl btn-light rounded-4">
                                        <i class="bi bi-people-fill"></i>
                                    </button>
                                </div>
                                <div class="text-dark col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text font-extrabold">All Users</h6>
                                    <h6 class="font-semibold mb-0">{{ $users + $workers + $ban_workers }}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Our Location</h5>
                    </div>
                    <div class="card-body">
                        <div class="googlemaps">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5775.209471573828!2d51.1549856!3d43.6355851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x41b43346ac9ae4bb%3A0x6cc9895cbfc20f47!2sMediana%20Services%20Limited!5e0!3m2!1sru!2skz!4v1710512526127!5m2!1sru!2skz"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="rounded-4"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
