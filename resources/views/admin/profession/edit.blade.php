@extends('admin.layouts.layout')


@section('title')
    Professions
@endsection


@section('header')
    Edit Proffesion
@endsection


@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><b>{{ $profession->name }}</b></h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical"
                        action="{{ route('professions.update', ['profession' => $profession->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="first-name-icon">Profession Name</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Profession name"
                                                id="first-name-icon" name="name" value="{{ $profession->name }}">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
