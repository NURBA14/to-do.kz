@extends('admin.layouts.layout')

@section('title')
    Tasks
@endsection


@section('header')
    Done Tasks
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Done Tasks</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Team</th>
                                        <th>Deadline</th>
                                        <th>Created At</th>
                                        <th>Is done</th>
                                        <th>In process</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tasks)
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>
                                                    <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                                                        {{ $task->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $task->team->name }}</td>
                                                <td>{{ $task->deadline }}</td>
                                                <td>
                                                    {{ $task->created_at }}
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-success">TRUE</button>
                                                </td>
                                                <td>
                                                    @if ($task->getInProcess())
                                                        <button type="button" class="btn btn-success">TRUE</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger">FALSE</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($task->getActive())
                                                        <a href="{{ route('setactive.tasks.index', ['id' => $task->id]) }}">
                                                            <button type="button" class="btn btn-success">TRUE</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('setactive.tasks.index', ['id' => $task->id]) }}">
                                                            <button type="button" class="btn btn-danger">FALSE</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                                                        <button type="button" class="btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit">
                                                            <i onclick="confirm('Delete this task')"
                                                                class="bi bi-trash3-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary pagination-lg">
                                @if ($tasks)
                                    {{ $tasks->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
