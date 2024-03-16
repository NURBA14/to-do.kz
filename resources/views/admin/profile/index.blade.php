@extends('admin.layouts.layout')


@section('title')
    Admin profile
@endsection

@section('header')
    Account Profile
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    @include('admin.layouts.errors')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <p class="text-subtitle text-muted">A page where users can change profile information</p>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center flex-column">
                                <div class="">
                                    <img style="border-radius: 50%" width="200px" height="200px"
                                        src="{{ asset(auth()->user()->getAvatar()) }}" alt="Avatar">
                                </div>
                                <h3 class="mt-3">{{ auth()->user()->name }}</h3>
                                @if (auth()->user()->profession)
                                    <p class="text-small">{{ auth()->user()->profession->name }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        value="{{ auth()->user()->name }}">
                                </div>

                                <label for="email">Profession:
                                </label>
                                <div class="form-group">
                                    @if ($professions)
                                        <select class="form-control" name="profession_id" id="">
                                            @if (auth()->user()->profession)
                                                <option selected value="{{ auth()->user()->profession->id }}">
                                                    {{ auth()->user()->profession->name }}</option>
                                            @else
                                                <option value="">Select profession</option>
                                            @endif
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
                                        <select class="form-control" name="rank_id" id="">
                                            @if (auth()->user()->rank)
                                                <option selected value="{{ auth()->user()->rank->id }}">
                                                    {{ auth()->user()->rank->name }}
                                                @else
                                                <option value="">Select rank</option>
                                            @endif
                                            </option>
                                            @foreach ($ranks as $k => $v)
                                                <option value="{{ $k }}">
                                                    {{ $v }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <label for="password">Teams:
                                </label>
                                <div class="form-group">
                                    @if ($teams)
                                        <select class="form-control" name="team_id" id="">
                                            @if (auth()->user()->team)
                                                <option selected value="{{ auth()->user()->team->id }}">
                                                    {{ auth()->user()->team->name }}</option>
                                            @else
                                                <option value="">Select team</option>
                                            @endif
                                            @foreach ($teams as $k => $v)
                                                <option value="{{ $k }}">
                                                    {{ $v }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="avatar" class="form-label">Avatar</label>
                                    <input type="file" name="avatar"
                                        class="form-control @error('avatar') is-invalid @enderror" id="avatar">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                            <form action="{{ route('admin.profile.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete Avatar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
