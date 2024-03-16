@extends('admin.layouts.layout')


@section('title')
    Tasks
@endsection


@section('header')
    Edit Task
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    @include('admin.layouts.errors')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <b>{{ $task->name }}</b>
                </h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('tasks.update', ['task' => $task->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" name="name" value="{{ $task->name }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text">Text</label>
                                        <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text" cols="30"
                                            rows="7">{{ $task->text }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="deadline">Deadline</label><br>
                                        <input class="@error('deadline') is-invalid @enderror" type="date" id="deadline"
                                            name="deadline" value="{{ $task->deadline }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="team_id">Select Team</label>
                                        @if ($teams)
                                            <select class="form-control @error('team_id') is-invalid @enderror"
                                                name="team_id" id="team_id">
                                                @foreach ($teams as $k => $v)
                                                    <option @if ($task->team->id == $k) selected @endif
                                                        value="{{ $k }}">{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <input type="checkbox" @if ($task->active == 1) checked @endif
                                                name="active" value="1" class="form-check-input" id="active">
                                            <label for="active">Active</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
