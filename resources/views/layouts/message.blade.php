@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <span class="fa fa-check-circle"></span> {{ Session::get('success') }}
    </div>
@endif

@if(count($errors))
    <div class="alert alert-danger" role="alert">
        <span class="fa fa-times-circle"></span> The following problems occurred:<p>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@guest
<div class="alert alert-info" role="alert">
    <span class="fa fa-info"></span> Please login before you access the system.
</div>
@endguest
