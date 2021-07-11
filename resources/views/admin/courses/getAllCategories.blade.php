<option value="">Select Category ...</option>
@foreach( $categories as $category )
    <option value="{{ $category->id }}">{{ $category->name }}</option>
@endforeach