@extends('admin.layouts.layout')

@section('title')
    Admin teams
@endsection

@section('header')
    Team: {{ $team->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if ($users)
                    @foreach ($users as $user)
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-start">
                                    <div class="">
                                        <img width="150px" height="150" style="border-radius: 100% "
                                            src="{{ asset($user->getAvatar()) }}" alt="Avatar">
                                    </div>
                                    <div class="card-body">
                                        <div class="comment-profileName">{{ $user->name }}</div>
                                        <div class="comment-time">
                                            Profession:<a
                                                href="{{ route('professions.show', ['profession' => $user->profession->id]) }}">
                                                {{ $user->profession->name }}
                                            </a>
                                        </div>
                                        <div class="comment-message">
                                            <p class="list-group-item-text truncate mb-20">
                                                Rank:<a href="{{ route('ranks.show', ['rank' => $user->rank->id]) }}">
                                                    {{ $user->rank->name }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="comment-actions">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
