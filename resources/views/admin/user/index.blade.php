@extends('admin.layouts.layout')

@section('title')
    Users
@endsection


@section('header')
    Users
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    @include('admin.layouts.errors')
    <section class="section">
        <div class="row" id="table-striped">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($users)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                                        data-bs-target="#inlineFormAdmin{{ $user->id }}">
                                                        EDIT
                                                    </button>

                                                    <div class="modal fade text-left"
                                                        id="inlineFormAdmin{{ $user->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="myModalLabel33">
                                                                        <b>{{ $user->name }}</b>
                                                                    </h4>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i data-feather="x"></i>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('users.store', ['id' => $user->id]) }}"
                                                                    method="POST">
                                                                    @csrf

                                                                    <div class="modal-body">
                                                                        <label for="email">Profession:
                                                                        </label>
                                                                        <div class="form-group">
                                                                            @if ($professions)
                                                                                <select class="form-control"
                                                                                    name="profession_id" id="">
                                                                                    @foreach ($professions as $k => $v)
                                                                                        <option value="{{ $k }}">
                                                                                            {{ $v }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            @endif
                                                                        </div>
                                                                        <label for="email">Rank:
                                                                        </label>
                                                                        <div class="form-group">
                                                                            @if ($ranks)
                                                                                <select class="form-control" name="rank_id"
                                                                                    id="">
                                                                                    @foreach ($ranks as $k => $v)
                                                                                        <option
                                                                                            value="{{ $k }}">
                                                                                            {{ $v }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            @endif
                                                                        </div>
                                                                        <label for="password">Teams:
                                                                        </label>
                                                                        <div class="form-group">
                                                                            @if ($teams)
                                                                                <select class="form-control" name="team_id"
                                                                                    id="">
                                                                                    @foreach ($teams as $k => $v)
                                                                                        <option
                                                                                            value="{{ $k }}">
                                                                                            {{ $v }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary ms-1"
                                                                            data-bs-dismiss="modal">
                                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                                            <span class="d-none d-sm-block">Submit</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
                                @if ($users)
                                    {{ $users->onEachSide(1)->links() }}
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
