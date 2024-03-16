@extends('admin.layouts.layout')

@section('title')
    Workers
@endsection


@section('header')
    Workers
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Workers</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Profession</th>
                                        <th>Team</th>
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Banned</th>
                                        <th>Is Admin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($workers)
                                        @foreach ($workers as $worker)
                                            <tr>
                                                <td>{{ $worker->id }}</td>
                                                <td>{{ $worker->name }}</td>
                                                <td>{{ $worker->email }}</td>
                                                <td>
                                                    @if ($worker->profession)
                                                        <a
                                                            href="{{ route('professions.show', ['profession' => $worker->profession->id]) }}">
                                                            {{ $worker->profession->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($worker->team)
                                                        <a href="{{ route('teams.show', ['team' => $worker->team->id]) }}">
                                                            {{ $worker->team->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($worker->rank)
                                                        <a href="{{ route('ranks.show', ['rank' => $worker->rank->id]) }}">
                                                            {{ $worker->rank->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('workers.store', ['id' => $worker->id]) }}">
                                                        <button type="button" class="btn btn-success">WORKER</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($worker->getBan())
                                                        <a href="{{ route('banned.store', ['id' => $worker->id]) }}">
                                                            <button type="button" class="btn btn-danger">FALSE</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('banned.store', ['id' => $worker->id]) }}">
                                                            <button type="button" class="btn btn-success">TRUE</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($worker->getAdmin())
                                                        <a href="{{ route('admins.store', ['id' => $worker->id]) }}">
                                                            <button type="button" class="btn btn-success">
                                                                TRUE
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admins.store', ['id' => $worker->id]) }}">
                                                            <button type="button" class="btn btn-danger">
                                                                FALSE
                                                            </button>
                                                        </a>
                                                    @endif
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
                                @if ($workers)
                                    {{ $workers->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
