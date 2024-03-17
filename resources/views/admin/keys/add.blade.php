@extends('admin.layout.app')
@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>New Keys</h4>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.alerts')

                        <form action="{{ route('key.store') }}" class="my-2" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="quantity" class="form-label">No. of keys <span class="text-danger">*</span></label>
                                    <input type="number" value="1" min="1" max="10000" name="quantity" required id="quantity" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="usage_limit" class="form-label">Usage Limit <span class="text-danger">*</span></label>
                                    <input type="number" value="1" min="1" max="1000" name="usage_limit" required id="usage-limit" class="form-control">
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="expiry" class="form-label">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" value="{{ date("Y-m-d",strtotime("+1 day")) }}" min="{{ date("Y-m-d",strtotime("+1 day")) }}" name="expiry" required id="expiry" class="form-control">
                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Save</button>
                                </div>                                
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection