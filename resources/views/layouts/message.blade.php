@if (count($errors))
    <div class="alert alert-danger" role="alert">
        <span class="oi" data-glyph="x"></span> The following problems occurred:<p>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@guest
<div class="alert alert-info" role="alert">
    <span class="oi" data-glyph="bullhorn"></span> Please login before you access the system.
</div>
@endguest
