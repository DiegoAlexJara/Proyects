<div>

    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Fecha:
        </label>
        <input type="date" wire:model.live='fecha'
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            required 
            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
    </div>

    <p style="font-size: 20px; text-align: center">ENTREGAS</p>
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
            @foreach ($pedidos as $item)
                <tr>
                    <td>{{ $item->domicilio }}</td>
                    <td>${{ $item->precio }}</td>
                    <td class="highlight">
                        
                            ${{ $item->propina }}
                    </td>
                    <td>${{ $item->pagado }}
                        </td>
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
</div>
