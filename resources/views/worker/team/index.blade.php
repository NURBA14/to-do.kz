@extends('worker.layouts.layout')


@section('title')
    Worker team
@endsection

@section('header')
    My Team: {{ Auth::user()->team->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if ($team)
                    @foreach ($team as $user)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-start">
                                    <div class="">
                                        <img width="150px" height="150" style="border-radius: 100% "
                                            src="{{ asset($user->getAvatar()) }}" alt="Avatar">
                                    </div>
                                    <div class="card-body">
                                        <div class="comment-profileName">{{ $user->name }}</div>
                                        <div class="comment-time">{{ $user->profession->name }}</div>
                                        <div class="comment-message">
                                            <p class="list-group-item-text truncate mb-20">{{ $user->rank->name }}</p>
                                        </div>
                                        <div class="comment-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-primary pagination-lg">
                        @if ($team)
                            {{ $team->onEachSide(1)->links() }}
                        @endif
                    </ul>
                </nav>

            </div>
        </div>
    </div>
@endsection
