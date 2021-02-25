@extends('layouts\app')

@section('content')
    <span class="badge bg-dark text-wrap" style="width: 6rem;">
        Settings
    </span>
    @if(session('password_changed'))
        <div class="badge bg-dark text-wrap" style="width: 6rem;">
            <span class="text-green-500">
                Updated <i class="fas fa-check-circle"></i>
            </span>
        </div>
    @endif
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h5 class="text-white h4">Change password</h5>

            <form action="{{route('settings.password')}}" method="post">
                @csrf
                @method('put')
                <div class="mb-3 text-white">
                    <label for="password" class="form-label">New password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3 text-white">
                    <label for="password_confirmation" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    @error('password')
                    <div class="text-red-700">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-outline-success">Update password</button>
            </form>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-key"></i>
            </button>
        </div>
    </nav>

    <div>




    </div>
@endsection
