@extends('admin.layouts.layout')


@section('title')
    Tasks
@endsection


@section('header')
@endsection


@section('content')
    @include('admin.layouts.success')

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">{{ $task->name }}</h4>
                <p class="card-text">
                    {{ $task->text }}
                </p>
                <p class="card-text">
                    <button class="btn btn-outline-success">{{ $task->created_at }}</button> -to-
                    <button class="btn btn-outline-danger">{{ $task->deadline }}</button>
                </p>
                <div class="table-responsive">
                    <table class="table mb-0 table-lg">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-bold-500">Team</td>
                                <td>
                                    <b>{{ $task->team->name }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Is done</td>
                                <td>
                                    @if ($task->getIsDone())
                                        <button class="btn btn-outline-success">TRUE</button>
                                    @else
                                        <button class="btn btn-outline-danger">FALSE</button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">Is Active</td>
                                <td>
                                    @if ($task->getActive())
                                        <a href="{{ route('setactive.tasks.index', ['id' => $task->id]) }}">
                                            <button type="button" class="btn btn-outline-success">TRUE</button>
                                        </a>
                                    @else
                                        <a href="{{ route('setactive.tasks.index', ['id' => $task->id]) }}">
                                            <button type="button" class="btn btn-outline-danger">FALSE</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-bold-500">In Process</td>
                                <td>
                                    @if ($task->getInProcess())
                                        <button class="btn btn-outline-success">TRUE</button>
                                    @else
                                        <button class="btn btn-outline-danger">FALSE</button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
