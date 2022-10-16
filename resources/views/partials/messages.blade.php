@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if ($message=Session::get('success'))
<div class="alert alert-success my-3" role="alert">
    <strong>{{$message}}</strong>
</div>
@endif
