@if (session()->has('danger'))
    <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
        {!! session()->get('danger') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
        {!! session()->get('success') !!}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show text-capitalize">
        <div class="alert-body">
            <button class="btn-close" data-bs-dismiss="alert"></button>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-warning"></i> {{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif
