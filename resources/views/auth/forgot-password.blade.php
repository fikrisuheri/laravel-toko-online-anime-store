@extends('layouts.frontend.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="mb-2">
                <h3>Lupa Sandi</h3>
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control rounded-0">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="site-btn w-100 rounded-0 mb-3">Kirim</button>
            </form>
        </div>
    </div>
</div>

@endsection
