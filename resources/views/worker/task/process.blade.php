@extends('worker.layouts.layout')

@section('title')
    Worker Tasks
@endsection


@section('header')
    Worker In Process Tasks
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">In Process Tasks</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Deadline</th>
                                        <th>Created At</th>
                                        <th>Is done</th>
                                        <th>In process</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($tasks)
                                        @foreach ($tasks as $task)
                                            <tr>
                                                <td>{{ $task->id }}</td>
                                                <td>
                                                    <p>
                                                        <button class="btn btn-outline-primary collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapseExample{{ $task->id }}"
                                                            aria-expanded="false" aria-controls="collapseExample">
                                                            {{ $task->name }}
                                                        </button>
                                                    </p>
                                                    <div class="collapse" id="collapseExample{{ $task->id }}"
                                                        style="">
                                                        {{ $task->text }}
                                                    </div>
                                                </td>
                                                <td>{{ $task->deadline }}</td>
                                                <td>
                                                    {{ $task->created_at }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('worker.task.set.done', ['id' => $task->id]) }}">
                                                        <button type="button" class="btn btn-danger">FALSE</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('worker.task.set.process', ['id' => $task->id]) }}">
                                                        <button type="button" class="btn btn-success">TRUE</button>
                                                    </a>
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
