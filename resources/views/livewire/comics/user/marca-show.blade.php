<div>
    <div class="container-marca">
        @foreach ($marcas as $item)
            <a href="{{ route('comics_userMarcasProducts', $item->name) }}">
                <div class="box hover-container" style="background-color: {{ $item->color }} ">
                    <div class="background-image"
                        style="background-image: url('{{ asset($item->path) }}');background-size: cover; height:350px; background-position: center;">
                        <span class="hover-text">
                            <p>{{ $item->name }}</p>{{ $item->description }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
