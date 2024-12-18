<div>
    <input type="text" class="form-control me-2 texto" wire:model.live='search' placeholder="Buscar producto..." />

    <div class="container">
        @foreach ($products as $key => $item)
            <div class="product-card">

                <div class="product-details">
                    <div class="imgs">
                        @if ($item->path)
                            <img src="{{ asset($item->path) }}" alt="Image" style="width: 120px; height: auto;">
                        @else
                            <img src="{{ asset('img/comic/sitio/default_image.jpg') }}" alt="Image"
                                style="width: 100px; height: auto;">
                        @endif
                    </div>
                    <div class="container-todo">
                        <h2 class="product-title">{{ $item->Name }}</h2>
                        <p class="product-price"><strong>PRECIO</strong> ${{ $item->price }}</p>
                        <p class="product-description">{{ $item->description }}</p>
                        <p class="stock">Unidades disponibles: {{ $item->stock }}</p>
                        @livewire('comics.user.add-cart', ['producId' => $item->id], key($key))
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    <style>
        label {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            color: #333;

        }

        input[type="number"] {
            width: 80px;
            padding: 5px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }



        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .stock {
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-size: 12px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #000000;
            font-weight: normal;
            text-decoration: none;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
        }
    </style>
</div>
