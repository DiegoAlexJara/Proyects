<div style="text-align: center">


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

</div>
