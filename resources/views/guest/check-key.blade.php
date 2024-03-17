@extends('guest.layout.app')
@section('content')
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-4">
            <div class="card mb-0">
              <div class="card-header">
                <h5>Input Key to Check</h5>
              </div>
                <div class="card-body">
                    @include('admin.includes.alerts')
                    <form action="{{ route('key.check') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="key" class="form-label">Key</label>
                            <input type="text" class="form-control" name="key" id="key">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Check Key</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
