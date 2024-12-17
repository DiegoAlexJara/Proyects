<div>
    <div style="display: flex">
        <input type="text" class="form-control me-2 texto" wire:model.live='search' placeholder="Buscar producto..." />
    </div>
    <div class="d-grid gap-2" style="margin: 15px">
        <button wire:click='NuevoProducto' class="btn btn-secondary" type="button">NUEVO PRODUCTO</button>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert" id="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success').style.display = 'none';
            }, 5000); // El mensaje desaparece después de 5 segundos
        </script>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th class="cole">#</th>
                <th class="cole">NOMBRE</th>
                <th class="cole">DESCRIPCION</th>
                <th class="cole">IMAGEN</th>
                <th class="cole">PRECIO</th>
                <th class="cole">UNIDADES</th>
                <th class="cole">MARCA</th>
                <th class="cole">CATEGORIA</th>
                <th class="cole">SUBCATEGORIA</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($products as $registro)
                <tr>

                    <th class="number">{{ $registro->id }}</th>
                    <th class="title">{{ $registro->name }}</th>
                    <th class="texto">{{ $registro->description }}</th>
                    <th>

                        @livewire('comics.admin.products.EditImage', ['IdUser' => $registro->id, 'model' => \App\Models\Comics\Product::class], key($registro->id))

                        {{-- @livewire('comics.admin.products.EditImage', ['IdUser' => $registro->id], key($registro->id)) --}}

                    </th>
                    <th class="texto">${{ $registro->price }}</th>
                    <th class="texto">

                        @livewire('comics.admin.products.product-unit', ['productId' => $registro->id], key('product-unit-' . $registro->id)) 
                    
                    </th>
                    <th class="texto">{{ $registro->Marca->name }}</th>
                    <th class="texto">{{ $registro->Category->name }}</th>
                    <th class="texto">{{ $registro->subcategory->name }}</th>
                    <th>
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ACCIONES
                        </a>
                        <ul class="dropdown-menu" style="color: rgba(255, 255, 255, 0); border: 0">

                            <li>
                                <div class="d-grid gap-2" style="margin-bottom: 5px">
                                    <button wire:click='edit({{$registro->id}})' class="btn btn-warning">MODIFICAR</button>
                                </div>
                            </li>
                            <li>
                                <div class="d-grid gap-2" style="color: rgba(255, 255, 255, 0); border: 0">
                                    <button wire:click='delete({{ $registro->id }})'
                                        class="btn btn-danger">ELIMINAR</button>
                                </div>
                            </li>



                        </ul>
                    </th>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    @if ($ProductNew)
        <div class="overlay-background"></div>
        <div class="overlay-square">
            <div style="display: flex">
                <div style="width: 90%">
                    <h2>Nuevo Producto</h2>
                </div>
                <div style="width: 10%; text-align: right">
                    <button class="btn btn-danger" wire:click='NuevoProducto'>X</button>
                </div>
            </div>
            <form wire:submit='save'>

                <div style="text-align: center; justify-items: center">
                    <div class="mb-3" style="width: 50%; text-align: center">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text"class="form-control" wire:model='formData.name'
                            value="{{ old('name') }}" placeholder="Nombre De Producto" style="text-align: center">
                        @error('formData.name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                    <textarea name="description" wire:model='formData.description' id="description"
                        style="width: 100%; height: 80px; resize: none; border: .5px solid black" oninput="updateCharCount()"
                        maxlength="255" placeholder="Descripcion Del Producto">
                            {{ old('description') }}
                    </textarea>
                    <p id="charCount">255 Caracteres Restantes</p>
                    @error('formData.description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div style="display: flex">
                    <div class="mb-3" style="width: 49%; margin-right: 2%">
                        <label for="exampleInputEmail1" class="form-label">PRECIO</label>
                        <input type="number"class="form-control" wire:model.live='price' name="price" id="price"
                            value="" max='10000' min='1'step="0.01">
                        @error('price')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3" style="width: 49%; ">
                        <label for="" class="form-label">UNIDADES</label>
                        <input type="number"class="form-control" name="stock" wire:model.live='stock' id="stock"
                            max='10000000' min='1'>
                        @error('stock')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">MARCA</label>
                    <select class="form-select" aria-label="Default select example"wire:model='formData.marca_id'
                        name="marca_id" id="marca_id" value="{{ old('marca_id') }}">
                        <option selected disabled value="">Marcas</option>
                        @foreach ($marcas as $registro)
                            <option value="{{ $registro->id }}" style="color: black">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.marca_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CATEGORIA</label>
                    <select class="form-select" aria-label="Default select example" name="category_id"
                        id="category_id" wire:model='formData.category_id' value="{{ old('category_id') }}">
                        <option selected disabled value="">Categorias</option>
                        @foreach ($categorys as $registro)
                            <option value="{{ $registro->id }}">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.category_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">SUB-CATEGORIA</label>
                    <select class="form-select" aria-label="Default select example" name="subcategory_id"
                        wire:model='formData.subcategory_id' id="subcategory_id"
                        value="{{ old('subcategory_id') }}">
                        <option selected disabled value="">SubCategorias</option>
                        @foreach ($subCategorys as $registro)
                            <option value="{{ $registro->id }}">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.subcategory_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>


                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">GUARDAR PRODUCTO</button>
                </div>

        </div>
    @endif

    @if ($editProduct)
        <div class="overlay-background"></div>
        <div class="overlay-square">
            <div style="display: flex">
                <div style="width: 90%">
                    <h2>Editar Producto</h2>
                </div>
                <div style="width: 10%; text-align: right">
                    <button class="btn btn-danger" wire:click='EditarProducto()'>X</button>
                </div>
            </div>
            <form wire:submit='editar'>

                <div style="text-align: center; justify-items: center">
                    <div class="mb-3" style="width: 50%; text-align: center">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text"class="form-control" wire:model='formData.name'
                            value="{{ old('name') }}" placeholder="Nombre De Producto" style="text-align: center">
                        @error('formData.name')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                    <textarea name="description" wire:model='formData.description' id="description"
                        style="width: 100%; height: 80px; resize: none; border: .5px solid black" oninput="updateCharCount()"
                        maxlength="255" placeholder="Descripcion Del Producto">
                        {{ old('description') }}
                </textarea>
                    <p id="charCount">255 Caracteres Restantes</p>
                    @error('formData.description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div style="display: flex">
                    <div class="mb-3" style="width: 49%; margin-right: 2%">
                        <label for="exampleInputEmail1" class="form-label">PRECIO</label>
                        <input type="number"class="form-control" wire:model.live='price' name="price"
                            id="price" value="" max='10000' min='1'step="0.01">
                        @error('price')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3" style="width: 49%; ">
                        <label for="" class="form-label">UNIDADES</label>
                        <input type="number"class="form-control" name="stock" wire:model.live='stock'
                            id="stock" max='10000000' min='1'>
                        @error('stock')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">MARCA</label>
                    <select class="form-select" aria-label="Default select example"wire:model='formData.marca_id'
                        name="marca_id" id="marca_id" value="{{ old('marca_id') }}">
                        <option selected disabled value="">Marcas</option>
                        @foreach ($marcas as $registro)
                            <option value="{{ $registro->id }}" style="color: black">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.marca_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CATEGORIA</label>
                    <select class="form-select" aria-label="Default select example" name="category_id"
                        id="category_id" wire:model='formData.category_id' value="{{ old('category_id') }}">
                        <option selected disabled value="">Categorias</option>
                        @foreach ($categorys as $registro)
                            <option value="{{ $registro->id }}">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.category_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">SUB-CATEGORIA</label>
                    <select class="form-select" aria-label="Default select example" name="subcategory_id"
                        wire:model='formData.subcategory_id' id="subcategory_id"
                        value="{{ old('subcategory_id') }}">
                        <option selected disabled value="">SubCategorias</option>
                        @foreach ($subCategorys as $registro)
                            <option value="{{ $registro->id }}">{{ $registro->name }}</option>
                        @endforeach
                    </select>
                    @error('formData.subcategory_id')
                        <p>{{ $message }}</p>
                    @enderror
                </div>


                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">EDITAR PRODUCTO</button>
                </div>

        </div>
    @endif

    <style>
        .overlay-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo semitransparente */
            z-index: 9998;
            /* Asegura que esté debajo de la superposición */
        }

        .overlay-square {
            padding: 10px;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 60%;
            height: auto;
            background-color: white;
            box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.5);
            z-index: 9999;
            /* Asegura que esté por encima de todo */
            transform: translate(-50%, -50%);
            /* Centra el cuadrado */
            /* Si quieres que cubra toda la pantalla, cambia las dimensiones y posición */
        }
    </style>
    <script src="{{ asset('js/comics/index-products.js') }}"></script>

</div>
