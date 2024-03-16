@extends('admin.layouts.layout')

@section('title')
    Banned users
@endsection


@section('header')
    Banned users
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Banned users</h4>
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
                                    @if ($banned)
                                        @foreach ($banned as $ban)
                                            <tr>
                                                <td>{{ $ban->id }}</td>
                                                <td>{{ $ban->name }}</td>
                                                <td>{{ $ban->email }}</td>
                                                <td>
                                                    @if ($ban->profession)
                                                        <a
                                                            href="{{ route('professions.show', ['profession' => $ban->profession->id]) }}">
                                                            {{ $ban->profession->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ban->team)
                                                        <a href="{{ route('teams.show', ['team' => $ban->team->id]) }}">
                                                            {{ $ban->team->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($ban->rank)
                                                        <a href="{{ route('ranks.show', ['rank' => $ban->rank->id]) }}">
                                                            {{ $ban->rank->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('workers.store', ['id' => $ban->id]) }}">
                                                        <button type="button" class="btn btn-success">WORKER</button>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{ route('banned.store', ['id' => $ban->id]) }}">
                                                        <button type="button" class="btn btn-success">TRUE</button>
                                                    </a>
                                                </td>
                                                <td>
                                                    @if ($ban->getAdmin())
                                                        <a href="{{ route('admins.store', ['id' => $ban->id]) }}">
                                                            <button type="button" class="btn btn-success">
                                                                TRUE
                                                            </button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admins.store', ['id' => $ban->id]) }}">
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
                                @if ($banned)
                                    {{ $banned->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
