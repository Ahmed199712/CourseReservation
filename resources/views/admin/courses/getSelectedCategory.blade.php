@foreach( $categories as $category )
    <option value="{{ $category->id }}" {{ $category->id == $course->category->id ? 'selected' : '' }} > {{ $category->name }} </option>
    {{ $course->id }}
@endforeach

