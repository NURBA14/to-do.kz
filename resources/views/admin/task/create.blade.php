@extends('admin.layouts.layout')


@section('title')
    Tasks
@endsection


@section('header')
    Create Task
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    @include('admin.layouts.errors')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create new Task</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" name="name" value="{{ old("name") }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="text">Text</label>
                                        <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text" cols="30"
                                            rows="7">{{ old("text") }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="deadline">Deadline</label><br>
                                        <input class="@error('deadline') is-invalid @enderror" type="date" id="deadline"
                                            name="deadline" value="{{ old("deadline") }}">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="team_id">Select Team</label>
                                        @if ($teams)
                                            <select class="form-control @error('team_id') is-invalid @enderror"
                                                name="team_id" id="team_id">
                                                @foreach ($teams as $k => $v)
                                                    <option value="{{ $k }}">{{ $v }}</option>
                                                @endforeach
                                            </select>
                                        @endif
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
