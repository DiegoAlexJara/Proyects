<div class="container-category">
    @foreach ($category as $item)
        <a href="{{ route('comics_userCategorysProducts', $item->name) }}">
                <div class="box hover-container" style="background-color: {{ $item->color }} ">
                    <h3>{{ $item->Name }}</h3>
                    <span class="hover-text">{{ $item->description }}</span>

                </div>
            </a>
    @endforeach
</div>