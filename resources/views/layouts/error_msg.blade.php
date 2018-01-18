@if (count($errors))
    <div class="alert alert-danger" role="alert">
        <span class="oi" data-glyph="x"></span> The following problems occurred:<p>
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@elseif (Request::is('login'))
    <div class="alert alert-info" role="alert">
        <span class="oi" data-glyph="info"></span> Please login before you access the system.
    </div>
@endif
