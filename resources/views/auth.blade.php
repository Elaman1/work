@if (Auth::check()) 
    {{Auth::id()}}
@endif
