<div style="text-align: center">
    @if ($oldImage)
        <img src="{{ asset($oldImage) }}" alt="Image" style="width: 100px; height: auto;">
    @else
        <img src="{{ asset('images/default_image.jpg') }}" alt="" style="width: 100px; height: auto;">
    @endif

    <p><button class="btn btn-success mt-3" wire:click="toggleSquare">MODIFICAR</button></p>

    @if ($showSquare)
        <div class="overlay-background"></div>
        <div class="overlay-square">
            <p>IMAGEN VIEJA</p>
            <img src="{{ asset($oldImage) }}" alt="Image" style="width: 100px; height: auto; margin 0 0 20px 0">

            <p>NUEVA IMAGEN</p>
            <input type="file" wire:model="image">
            @if ($image)
                <div class="mt-4">
                    <p>Previsualización de la imagen seleccionada:</p>
                    <img src="{{ $image->temporaryUrl() }}" alt="Imagen seleccionada" style="max-width: 300px;">
                </div>
            @endif
            <p>
                @error('image')
                    <span class="error">{{ $message }}</span>
                @enderror
            </p>
            <p><button wire:click="updateImage" class="btn btn-success">ACTUALIZAR</button></p>
            <p></p>
            <button wire:click="toggleSquare" class="btn btn-warning">CANCELAR</button>
        </div>
    @endif
</div>
