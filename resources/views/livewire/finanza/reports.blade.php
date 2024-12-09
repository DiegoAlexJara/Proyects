<div>
    <div>
        <section class="transactions">
            <div style="text-align: center; margin-bottom: 10px">
                <h2>TRANSACCIONES</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Tipo De Transaccion</th>
                        <th>Método De Pago</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($transactions as $item)
                        <tr>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->method_payment }}</td>
                            @if ($item->amount < 0)
                                <td>${{ -$item->amount }}</td>
                            @else
                                <td>${{ $item->amount }}</td>
                            @endif
                            <td style="color: rgb(255, 255, 255)">
                                <button wire:click='report({{ $item->id }})'>
                                    Ver Reporte
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $transactions->links() }} <!-- Enlaces de paginación -->
            </div>
        </section>
        <button wire:click='return'>
            Regresar
        </button>
    </div>
    @if ($showSquare)
        <div class="backdrop" id="backdrop"></div>
        <div class="overlay-square">
            <section class="reports" style="text-align: center">
                <table class="transaction-info">
                    <tr>
                        <th>Campo</th>
                        <th>Detalle</th>
                    </tr>
                    <tr>
                        <td>Tipo</td>
                        <td class="highlight">{{ $reportes->type }}</td>
                    </tr>
                    <tr>
                        <td>Categoría</td>
                        <td>{{ $reportes->categorie }}</td>
                    </tr>
                    <tr>
                        <td>Método de Pago</td>
                        <td>{{ $reportes->method_payment }}</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td>{{ $reportes->description }}</td>
                    </tr>
                    <tr>
                        <td>Monto</td>
                        <td class="highlight">
                            @if ($reportes->amount > 0)
                                ${{ $reportes->amount }} MXN
                            @else
                                ${{ -$reportes->amount }} MXN
                            @endif
                        </td>
                    </tr>
                </table>
                <button type="button" style="margin-top: 10px;" wire:click='transaction'
                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    CERRAR
                </button>

            </section>
        </div>
    @endif
    <style>
        .overlay-square {
            padding: 10px;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 60%;
            height: auto;
            z-index: 9999;
            transform: translate(-50%, -50%);
        }

        .backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Oscurece la parte trasera */
            z-index: 1000;
            /* Debajo del modal */
        }

        /* Ocultar la capa y el modal por defecto */
        .hidden {
            display: none;
        }
    </style>
    
</div>
