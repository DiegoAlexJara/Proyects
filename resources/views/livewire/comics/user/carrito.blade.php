<div>
    <div class="container">
        @if (session()->has('message'))
            <div style="color: green;">{{ session('message') }}</div>
        @endif
    </div>
    @if ($cart && $cart->items->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <ul class="list-group">
                        @php
                            $precio = [];
                            $total = 0;
                        @endphp
                        @foreach ($cart->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">{{ $item->product->Name }}</h5>

                                    @php
                                        $precio[$item->id] = $item->product->price * $item->quantity;
                                        $total += $precio[$item->id];
                                    @endphp
                                    <small>Unidades : {{ $item->quantity }} | Precio por unidad:
                                        ${{ $item->product->price }}
                                        <p>
                                            Precio de unidades :
                                            ${{ $precio[$item->id] }}
                                        </p>
                                    </small>

                                    <p>
                                        Disminuir
                                        <button class="btn btn-danger"
                                            wire:click='Disminuir({{ $item->id }}, {{ $item->product->id }})'
                                            aria-label="Disminuir unidades">-</button>
                                        UNIDADES
                                    </p>
                                </div>
                                <form wire:submit.prevent='delete({{ $item->id }}, {{ $item->product->id }})'>
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    <div class="text-center mt-3">
                        <p>PRECIO TOTAL : ${{ $total }}</p>
                        <a href="" class="btn btn-success">Proceder a Pagar</a>
                        <p style="margin: 10px"><a href="{{ route('comics_userInicio') }}" class="btn btn-primary">REGRESAR</a></p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <p>Tu carrito está vacío.</p>
            <a href="{{ route('comics_userInicio') }}" class="btn btn-primary">Volver a comprar</a>
        </div>
    @endif
</div>
