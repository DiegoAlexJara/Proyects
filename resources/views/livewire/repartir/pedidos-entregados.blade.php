<div>
    <button type="button" style="width: 100%" wire:click='PediodNuevo'
        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        AÑADIR
    </button>
    <table>
        <thead>
            <tr>
                <th>Domicilio</th>
                <th>Precio</th>
                <th>Propina</th>
                <th>Total</th>
                <th>Pagado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $item)
                <tr>
                    <td>{{ $item->domicilio }}</td>
                    <td>${{ $item->precio }}</td>
                    <td class="highlight">
                        <button wire:click='editarPropina({{ $item->id }})'>
                            ${{ $item->propina }}
                        </button>
                    </td>
                    <td><button wire:click='editarPago({{ $item->id }})'>
                            ${{ $item->pagado }}
                        </button></td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td>Totales</td>
                <td>${{ $totPrecio }}</td>
                <td>${{ $totPropinas }}</td>
                <td>${{ $total }}</td>
            </tr>
        </tbody>
    </table>

    <button wire:click='pedidos'>VER REPARTIDAS</button>
    @if ($Pedido)
        <div class="overlay-background"></div>
        <div class="overlay-square">

            <div style="display: flex">
                <div style="width: 95%; text-align: center">
                    <b style="font-size: 20px; text-align: center">PEDIDO</b>
                </div>
                <div style="text-align: left">
                    <button type="button" wire:click='PediodNuevo'
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        X
                    </button>
                </div>


            </div>

            <form wire:submit.prevent='save'>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        DIRECCION
                    </label>
                    <input type="text" wire:model='direccion'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="CALLE #NUMERO" required />
                </div>

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        PRECIO
                    </label>
                    <input type="number" wire:model='precio'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="324" required />
                </div>

                <div class="mb-6">
                    <input type="submit" value="SUBIR"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                </div>

            </form>
        </div>
    @endif

    @if ($ViewPropina)
        <div class="overlay-background"></div>
        <div class="overlay-square">

            <div style="display: flex">
                <div style="width: 95%; text-align: center">
                    <b style="font-size: 20px; text-align: center">PROPINA</b>
                </div>
                <div style="text-align: left">
                    <button type="button" wire:click='PropinasView'
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        X
                    </button>
                </div>


            </div>

            <form wire:submit.prevent='editarPropinaId'>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        PROPINA
                    </label>
                    <input type="number" wire:model='propina'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="324" required />
                </div>

                <div class="mb-6">
                    <input type="submit" value="ACTUALIZAR"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                </div>
            </form>
        </div>
    @endif

    @if ($ViewPagado)
        <div class="overlay-background"></div>
        <div class="overlay-square">

            <div style="display: flex">
                <div style="width: 95%; text-align: center">
                    <b style="font-size: 20px; text-align: center">TOTAL</b>
                </div>
                <div style="text-align: left">
                    <button type="button" wire:click='PagadoView'
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        X
                    </button>
                </div>


            </div>

            <form wire:submit.prevent='editarPagadoId'>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        TOTAL
                    </label>
                    <input type="number" wire:model='pagado'
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="324" required />
                </div>

                <div class="mb-6">
                    <input type="submit" value="ACTUALIZAR"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

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
            width: 95%;
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
</div>
