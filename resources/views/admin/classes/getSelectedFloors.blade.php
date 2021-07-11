@foreach( $floors as $floor )
<option value="{{ $floor->id }}" {{ $floor->id == $class->floor->id ? 'selected' : '' }}>{{ $floor->name }}</option>
@endforeach



