@if( $errors->any() )
    <ul class="alert alert-danger list-unstyled">
        @foreach( $errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if( Session::has('errorLogin') )
    <ul class="alert alert-danger list-unstyled">
        <li>{{ Session::get('errorLogin') }}</li>
    </ul>
@endif