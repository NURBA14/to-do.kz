@extends('admin.layouts.layout')


@section('title')
    Professions
@endsection


@section('header')
    Professions
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Professions</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Workers</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($professions)
                                        @foreach ($professions as $profession)
                                            <tr>
                                                <td>{{ $profession->id }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('professions.show', ['profession' => $profession->id]) }}">
                                                        {{ $profession->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $profession->users_count }}</td>
                                                <td>{{ $profession->created_at }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('professions.edit', ['profession' => $profession->id]) }}">
                                                        <button type="button" class="btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                    <form
                                                        action="{{ route('professions.destroy', ['profession' => $profession->id]) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Delete this profession')"
                                                            class="btn btn-danger">
                                                            <i class="bi bi-trash-fill"></i>
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
                                @if ($professions)
                                    {{ $professions->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
