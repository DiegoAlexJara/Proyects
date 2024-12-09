<div>
    <header class="header">
        <h1>Panel de Finanzas</h1>
    </header>
    @if (session()->has('mensajeExito'))
        <div id="mensaje-exito" class="alert alert-success">
            {{ session('mensajeExito') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('mensaje-exito').style.display = 'none';
            }, 5000); // El mensaje desaparece después de 5 segundos
        </script>
    @endif
    <main class="dashboard">
        <!-- Resumen General -->
        <section class="summary">
            <div class="summary-card">
                <h2>Total en Cuenta</h2>
                <p class="amount"id='amountTot'>${{ $amountTot }}</p>
            </div>
            <div class="summary-card">
                <h2>Gastos del Mes</h2>
                <p class="amount" id='amountTot'>${{ $amountMonthOut }}</p>
            </div>
            <div class="summary-card">
                <h2>Ingresos del Mes</h2>
                <p class="amount" id='amountTot'>${{ $amountMonthIn }}</p>
            </div>
        </section>

        <!-- Tabla de Transacciones -->
        <section class="transactions">
            <h2>Últimas Transacciones</h2>
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
                            <td >{{ $item->created_at }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->method_payment }}</td>
                            @if ($item->amount < 0)
                                <td>${{ -$item->amount }}</td>
                            @else
                                <td>${{ $item->amount }}</td>
                            @endif                        
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </section>

        <!-- Botones de Acción -->
        <section class="actions">
            <button class="btn" wire:click='transaction'>Añadir Transacción</button>
            <button class="btn" wire:click='Reports'>Ver Reportes</button>
        </section>
    </main>
    @if ($showSquare)
        <div class="backdrop" id="backdrop"></div>
        <div class="overlay-square">
            <div style="display: flex;">
                <div style="width: 80%; text-align: center ">
                    <p class="h2">Transaccion</p>
                </div>
                <div style="text-align: right; width: 20%">
                    <button type="button" wire:click='transaction'
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        X
                    </button>
                </div>
            </div>
            <div style="width: 49%; margin-bottom: 15px">

                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo De
                    Transferencia:</label>
                <select id="countries" wire:model.live="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled value="">Selecciona un tipo</option>
                    <option value="Ingreso">Ingreso</option>
                    <option value="Gasto">Gasto</option>
                </select>
                @error('tipe')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div style="display: flex; margin-bottom: 15px">
                <div style="width: 49%; margin-right: 2%">
                    <label for="countries"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoria De
                        Transferencia:</label>
                    <select id="countries" wire:model="categorie"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Selecciona un tipo de transferencia</option>
                        @if ($type === 'Ingreso')
                            <option value="Salario">Salario</option>
                            <option value="Bonos y Comisiones">Bonos y Comisiones</option>
                            <option value="Inversiones">Inversiones</option>
                            <option value="Freelanceo o Trabajos Adicionales">Freelance o Trabajos Adicionales</option>
                            <option value="Regalos">Regalos</option>
                            <option value="Reembolsos">Reembolsos</option>
                            <option value="Rentas Recibidas">Rentas Recibidas</option>
                            <option value="Ventade Bienes">Venta de Bienes</option>
                            <option value="Otros Ingresos">OtrosIngresos</option>
                        @elseif ($type === 'Gasto')
                            <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                            <option value="Hogar">Hogar</option>
                            <option value="Transporte">Transporte</option>
                            <option value="Entretenimiento">Entretenimiento</option>
                            <option value="Salud">Salud</option>
                            <option value="Educación">Educación</option>
                            <option value="Ropa y Accesorios">Ropa y Accesorios</option>
                            <option value="Deudas y Obligaciones">Deudas y Obligaciones</option>
                            <option value="Regalos y Donaciones">Regalos y Donaciones</option>
                            <option value="Otros Gastos">Otros Gastos</option>
                        
                        @endif
                    </select>
                    @error('categorie')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div style="width: 49%  ">
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Metodo De Pago:</label>
                    <select id="countries" wire:model="method_payment"
                        class="bg-gray-50 border border-gray    -300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" disabled selected>Selecciona una categoria</option>
                        @if ($type == 'Ingreso')
                            <option value="Transferencia Recibida">Transferencia Recibida</option>
                            <option value="Pago en Efectivo">Pago en Efectivo</option>
                            <option value="Cheque Recibido">Cheque Recibido</option>
                            <option value="Pago Móvil Recibido">Pago Móvil Recibido</option>
                            <option value="Depósito Directo">Depósito Directo</option>
                            <option value="Otros Métodos de Ingreso">Otros Métodos de Ingreso</option>
                        @elseif ($type == 'Gasto')
                            <option value="Efectivo">Efectivo</option>
                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                            <option value="Tarjeta de Débito">Tarjeta de Débito</option>
                            <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                            <option value="Pago Móvil (Apps)">Pago Móvil (Apps)</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Criptomonedas">Criptomonedas</option>
                            <option value="Billetera Electrónica">Billetera Electrónica</option>
                            <option value="Débito Automático">Débito Automático</option>
                            <option value="Pagos a Plazos">Pagos a Plazos</option>
                            <option value="Intercambio o Trueque">Intercambio o Trueque</option>
                            <option value="Otros Métodos de Pago">Otros Métodos de Pago</option>
                        @endif
                    </select>
                    @error('method_payment')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div style="display: flex; margin-bottom: 15px">
                <div style="width: 49%; margin-right: 2%">
                    <label for="number-input"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad:</label>
                    <input type="number" wire:model.live='amount' aria-describedby="helper-text-explanation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="12345" required />
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div style="width: 49%;">
                    <label for=""
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha:</label>
                    <input type="date" wire:model='CreateTransferencia' disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div style="width: 49%;">
                <label for="default-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion:</label>
                <input type="text" id="default-input" wire:model = 'description'
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div style="text-align: right">
                <button type="button" wire:click='save'
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Guardar
                </button>
            </div>

        </div>
    @endif
    <style>
        .h2 {
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-size: 30px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: #000000;
            font-weight: 400;
            text-decoration: none solid rgb(68, 68, 68);
            font-style: normal;
            font-variant: normal;
            text-transform: uppercase;
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
    <script>
        function formatPeso(amount) {
            return amount.toLocaleString('es-MX', {
                style: 'currency',
                currency: 'MXN'
            });
        }

        // Asumiendo que $amountTot es una variable PHP que se pasa al JavaScript
        let amountTot = {{ $amountTot }}; // Asegúrate de pasar el valor correcto desde PHP a JS

        document.getElementById('amountTot').innerText = formatPeso(amountTot);
    </script>
</div>