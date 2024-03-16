@extends('worker.layouts.layout')


@section('title')
    Worker profile
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
                            <form action="{{ route('worker.profile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        value="{{ auth()->user()->name }}">
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
                            <form action="{{ route('worker.profile.destroy') }}" method="POST">
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
