@if($errors->{ $bag ?? 'default' }->any())
    @foreach($errors->{ $bag ?? 'default' }->all() as $error)
        <div class="alert alert-warning text-center" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
