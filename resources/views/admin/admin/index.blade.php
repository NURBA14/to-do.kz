@extends('admin.layouts.layout')

@section('title')
    Admins
@endsection


@section('header')
    Admins
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Admins</h4>
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
                                    @if ($admins)
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>{{ $admin->id }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>
                                                    @if ($admin->profession)
                                                        <a
                                                            href="{{ route('professions.show', ['profession' => $admin->profession->id]) }}">
                                                            {{ $admin->profession->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin->team)
                                                        <a href="{{ route('teams.show', ['team' => $admin->team->id]) }}">
                                                            {{ $admin->team->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin->rank)
                                                        <a href="{{ route('ranks.show', ['rank' => $admin->rank->id]) }}">
                                                            {{ $admin->rank->name }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin->getWorker())
                                                        <a href="{{ route('workers.store', ['id' => $admin->id]) }}">
                                                            <button type="button" class="btn btn-success">WORKER</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('workers.store', ['id' => $admin->id]) }}">
                                                            <button type="button" class="btn btn-danger">NOT
                                                                WORKER</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($admin->getBan())
                                                        <a href="{{ route('banned.store', ['id' => $admin->id]) }}">
                                                            <button type="button" class="btn btn-danger">FALSE</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('banned.store', ['id' => $admin->id]) }}">
                                                            <button type="button" class="btn btn-success">TRUE</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admins.store', ['id' => $admin->id]) }}">
                                                        <button type="button" class="btn btn-success">
                                                            TRUE
                                                        </button>
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
                                @if ($admins)
                                    {{ $admins->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
