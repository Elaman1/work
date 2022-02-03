{{ $i = 1 }}

@if(isset($products))
    @foreach($products as $product)
        <p>{{$i}}.{{ $product->title }}</p>{{$i++}}
    @endforeach
@endif