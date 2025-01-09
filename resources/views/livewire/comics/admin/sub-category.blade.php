<div>

    <div class="d-grid gap-2">
        <input type="text" class="form-control" wire:model.live='search' placeholder="Buscar marca...">
    </div>
    @can('create_subcategorias')
        <div class="d-grid gap-2" style="margin: 15px">
            <button wire:click='SubCategoriaNueva' class="btn btn-secondary" type="button">NUEVA SUB-CATEGORIA</button>
        </div>
    @endcan
    @if (session()->has('success'))
        <div class="alert alert-primary" role="alert" id="success-message">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 5000); // El mensaje desaparece después de 5 segundos
        </script>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th class="cole">#</th>
                <th class="cole">NOMBRE</th>
                <th class="cole">DESCRIPCION</th>
                <th class="cole" style="text-align: center">COLOR</th>
                <th class="cole" style="text-align: center">CATEGORIA</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($subCategory as $registro)
                <tr>

                    <th class="number">{{ $registro->id }}</th>
                    <th class="title">{{ $registro->name }}</th>
                    <th class="texto">{{ $registro->description }}</th>

                    <th style="text-align: center">
                        <div class="color-circle" style="background-color: {{ $registro->color }};"></div>
                    </th>

                    <th class="texto">{{ $registro->Category->name }}</th>

                    <th>
                        @can('edit_subcategorias')
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                ACCIONES
                            </a>
                            <ul class="dropdown-menu" style="color: rgba(255, 255, 255, 0); border: 0">

                                <li>
                                    <div class="d-grid gap-2" style="margin-bottom: 5px">
                                        <button wire:click='edit({{ $registro->id }})'
                                            class="btn btn-warning">MODIFICAR</button>
                                    </div>
                                </li>
                                <li>
                                    @can('delete_subcategorias')
                                        <div class="d-grid gap-2" style="color: rgba(255, 255, 255, 0); border: 0">
                                            <button wire:click='delete({{ $registro->id }})'
                                                class="btn btn-danger">ELIMINAR</button>
                                        </div>
                                    @endcan
                                </li>



                            </ul>
                        @endcan

                    </th>


                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($SubCategoriaNew)
        <div class="overlay-background"></div>
        <div class="overlay-square">
            <div style="display: flex">
                <div style="width: 90%">
                    <h2>SUB-CATEGORIA NUEVA</h2>
                </div>
                <div style="width: 10%; text-align: right">
                    <button class="btn btn-danger" wire:click='SubCategoriaNueva'>X</button>
                </div>
            </div>
            <form wire:submit.prevent='save'>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text"class="form-control" name="Name" wire:model='formData.name'
                        value="{{ old('Name') }}" placeholder="Nombre De La Marca">
                    @error('formData.name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        wire:model='formData.description' oninput="updateCharCount()" maxlength="255"
                        style="width: 100%; height: 80px; resize: none; border: .5px solid black" placeholder="Descripcion De La Marca">
                        {{ old('description') }}
                    </textarea>
                    <p id="charCount">255 Caracteres Restantes</p>
                    @error('formData.description')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">CATEGORIA</label>
                    <select class="form-select" aria-label="Default select example" name="category_id" id="category_id"
                        wire:model='formData.category_id' value="{{ old('category_id') }}">
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
                    <label for="color">Selecciona un color:</label>
                    <input type="color" name="color" id="color" class="form-control"wire:model='formData.color'
                        value="{{ old('color') }}">
                    @error('formData.color')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">CREAR SUB-CATEGORIA</button>
                </div>
            </form>
        </div>
    @endif

    @if ($editSubCategoria)
        <div class="overlay-background"></div>
        <div class="overlay-square">
            <div style="display: flex">
                <div style="width: 90%">
                    <h2>SUB-CATEGORIA NUEVA</h2>
                </div>
                <div style="width: 10%; text-align: right">
                    <button class="btn btn-danger" wire:click='EditarSubCategory'>X</button>
                </div>
            </div>
            <form wire:submit.prevent='editar'>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text"class="form-control" name="Name" wire:model='formData.name'
                        value="{{ old('Name') }}" placeholder="Nombre De La Marca">
                    @error('formData.name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Descripcion</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                        wire:model='formData.description' oninput="updateCharCount()" maxlength="255"
                        style="width: 100%; height: 80px; resize: none; border: .5px solid black" placeholder="Descripcion De La Marca">
                        {{ old('description') }}
                    </textarea>
                    <p id="charCount">255 Caracteres Restantes</p>
                    @error('formData.description')
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
                    <label for="color">Selecciona un color:</label>
                    <input type="color" name="color" id="color"
                        class="form-control"wire:model='formData.color' value="{{ old('color') }}">
                    @error('formData.color')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="d-grid gap-2 mb-3">
                    <button class="btn btn-primary" type="submit">EDITAR SUB-CATEGORIA</button>
                </div>
            </form>
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
