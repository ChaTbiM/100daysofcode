

<p>Learning Laravel 6 - yaay </p>

    @forelse ($services as $service)
        <p> {{$service->name}} </p>    
    @empty
        <p>There is No Service </p>
    @endforelse