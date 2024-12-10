<div>
    <input type="text" class="form-control me-2 texto" wire:model.live='search' placeholder="Buscar producto..." />

    <div class="container">
        @foreach ($products as $item)
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
                        {{-- @livewire('AñadirCarrito', ['producId' => $item->id], key($item->id)) --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

      <!-- Incluye Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</div>
