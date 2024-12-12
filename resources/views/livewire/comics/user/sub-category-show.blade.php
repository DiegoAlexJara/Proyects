<div class="container-category">
    @foreach ($subcategory as $item)
    <a href="{{ route('comics_userSubCategorysProducts', $item->name) }}">

                <div class="box hover-container" style="background-color: {{ $item->color }} ">
                    <h3>{{ $item->Name }}</h3>
                    <span class="hover-text">{{ $item->description }}</span>

                </div>
            </a>
    @endforeach
</div>