@foreach( $classes as $class )
    <option value="{{ $class->id }}" {{ $class->id == $course->class->id ? 'selected' : '' }} > {{ $class->name }} </option>
@endforeach

