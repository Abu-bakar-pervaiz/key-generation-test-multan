@if ($errors->any())
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-warning"></i> {{ $error }}</li>
            @endforeach
        </div>
    </div>
@endif
