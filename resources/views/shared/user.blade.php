@if ($loop->odd)
<div class="bg-red-500">
<!-- class=&quot;bg-red-500&quot; 
Здесь двойные кавычки изменились без этого считается ошибкой-->
@else
<div>
@endif
    {{ $user->name }}
</div>