@extends('guest.layout.app')
@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
                <div class="card-body">

                    @include('admin.includes.alerts')
                    <form action="{{ route('login.check') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
