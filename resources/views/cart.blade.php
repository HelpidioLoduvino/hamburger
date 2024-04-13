@extends('main')

@section('content')
    <div class="container mt-5">
        <h5 class="title mt-5">Carrinho</h5>
        <div class="title-separator mb-3"></div>

        <div class="row">
            <div class="col-md-6">
                <div style="overflow:auto; overflow-x:hidden; max-height:500px;">
                    <div class="card mb-3" style="max-width: 540px; background-color:blanchedalmond;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('img/img1.png')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Hamburger Duplo</h5>
                                    <hr>
                                    <p class="priceDisplay card-text">2000,00 AOA</p>
                                    <hr>
                                    <p class="card-text">Hamburger + gasosa</p>
                                    <hr>
                                    <div class="d-flex">
                                        <button class="btn btn-outline-dark decreaseBtn me-3">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="quantityDisplay me-3 mt-2">1</span>
                                        <button class="btn btn-outline-dark increaseBtn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="max-width: 540px; background-color:blanchedalmond;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{asset('img/img1.png')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Hamburger Duplo</h5>
                                    <hr>
                                    <p class="priceDisplay card-text">2000,00 AOA</p>
                                    <hr>
                                    <p class="card-text">Hamburger + gasosa</p>
                                    <hr>
                                    <div class="d-flex">
                                        <button class="btn btn-outline-dark decreaseBtn me-3">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="quantityDisplay me-3 mt-2">1</span>
                                        <button class="btn btn-outline-dark increaseBtn">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col">
                <div class="card" style="background-color:blanchedalmond;">
                    <div class="card-body">
                        <h4 class="card-text totalToPay" style="color: green;">20000,00 AOA</h3>
                        <hr>
                        <h5 class="card-title">FORMA DE PAGAMENTO</h5>
                        <div class="d-flex">
                            <input type="checkbox" class="mt-2 me-2" name="payment_method" value="Entrega" id="payment_method1">
                            <p>Pagar na entrega</p>
                        </div>
                        <div class="d-flex">
                            <input type="checkbox" class="mt-2 me-2" name="payment_method" value="Transferência" id="payment_method2">
                            <p>Pagar por transferência</p>
                        </div>

                        <div>
                            <p id="fileWarning" style="display: none;"> <strong>Nº de conta: 00000000000000 <br> IBAN: 0000. 0000. 0000. 0000. 0000. 0 <br><br> <span style="color: red;">Envie o comprovativo da transferência:</span></strong></p>
                            <input type="file" id="fileInput" name="bank_receipt" accept="application/pdf" class="form-control">
                        </div>
                        <hr>
                        <button class="btn btn-success mb-2" id="confirmButton">Confirmar</button> <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Seleciona todos os botões de diminuir e aumentar usando uma classe
            const decreaseBtns = document.querySelectorAll('.decreaseBtn');
            const increaseBtns = document.querySelectorAll('.increaseBtn');
            const quantityDisplays = document.querySelectorAll('.quantityDisplay');
            const priceDisplays = document.querySelectorAll('.priceDisplay');

            // Preço inicial
            const precoUnitario = 2000; // Preço do hamburger

            // Função para atualizar o preço total
            function atualizarPrecoTotal(quantityDisplay, priceDisplay) {
                // Obtém a quantidade atual e a converte para um número
                const quantidade = parseInt(quantityDisplay.innerText);

                // Calcula o preço total multiplicando o preço unitário pela quantidade
                const precoTotal = precoUnitario * quantidade;

                // Atualiza o texto de exibição do preço total
                priceDisplay.textContent = precoTotal.toLocaleString('pt-ao', { style: 'currency', currency: 'AOA' });
            }

            // Adiciona um ouvinte de eventos para cada botão de diminuir
            decreaseBtns.forEach((decreaseBtn, index) => {
                decreaseBtn.addEventListener('click', function() {
                    // Obtém a quantidade atual e a converte para um número
                    let currentQuantity = parseInt(quantityDisplays[index].innerText);

                    // Verifica se a quantidade atual é maior que 1 antes de diminuir
                    if (currentQuantity > 1) {
                        // Diminui a quantidade em 1
                        currentQuantity--;

                        // Atualiza o texto de exibição da quantidade
                        quantityDisplays[index].innerText = currentQuantity;

                        // Atualiza o preço total
                        atualizarPrecoTotal(quantityDisplays[index], priceDisplays[index]);
                    }
                });
            });

            // Adiciona um ouvinte de eventos para cada botão de aumentar
            increaseBtns.forEach((increaseBtn, index) => {
                increaseBtn.addEventListener('click', function() {
                    // Obtém a quantidade atual e a converte para um número
                    let currentQuantity = parseInt(quantityDisplays[index].innerText);

                    // Aumenta a quantidade em 1
                    currentQuantity++;

                    // Atualiza o texto de exibição da quantidade
                    quantityDisplays[index].innerText = currentQuantity;

                    // Atualiza o preço total
                    atualizarPrecoTotal(quantityDisplays[index], priceDisplays[index]);
                });
            });

            // Atualiza o preço total inicial para cada item
            quantityDisplays.forEach((quantityDisplay, index) => {
                atualizarPrecoTotal(quantityDisplay, priceDisplays[index]);
            });

            function updateTotalPrice(){
                const quantity = parseInt(document.querySelector('.quantityDisplay').textContent);
                const pricePerUnit = parseFloat(document.querySelector('.priceDisplay').textContent.replace('AOA', '').replace(',', '.'));

                var totalPrice = pricePerUnit * quantity;

                document.querySelector('.totalToPay').textContent = totalPrice.toFixed(2).replace('.', ',') + ' AOA';
            }

            updateTotalPrice();

        });
    </script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[name="payment_method"]');
        const confirmButton = document.getElementById('confirmButton');
        const paymentWarning = document.getElementById('paymentWarning');
        const transferCheckbox = document.getElementById('payment_method2');
        const fileInput = document.getElementById('fileInput');
        const fileWarning = document.getElementById('fileWarning');

        confirmButton.disabled = true;
        fileWarning.style.display = 'none';
        fileInput.style.display = 'none';

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                console.log('Evento de mudança de checkbox');
                checkboxes.forEach((otherCheckbox) => {
                    if (otherCheckbox !== this) {
                        otherCheckbox.checked = false;
                    }
                });

                if (isChecked(checkboxes) && !transferCheckbox.checked) {
                    confirmButton.disabled = false;
                    paymentWarning.style.display = 'none';
                } else {
                    confirmButton.disabled = true;
                    paymentWarning.style.display = 'block';
                }
            });
        });

        transferCheckbox.addEventListener('change', function() {
            if (transferCheckbox.checked) {
                confirmButton.disabled = true;
                fileInput.style.display = 'block';
                fileWarning.style.display = 'block';
            } else {
                fileInput.disabled = true;
                fileInput.style.display = 'none';
                fileWarning.style.display = 'none';
                if (isChecked(checkboxes)) {
                    confirmButton.disabled = false;
                    paymentWarning.style.display = 'none';
                }
            }
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.value) {
                confirmButton.disabled = false;
                fileWarning.style.display = 'none';
            } else {
                confirmButton.disabled = true;
                fileWarning.style.display = 'block';
            }
        });

        function isChecked(checkboxes) {
            return Array.from(checkboxes).some((checkbox) => checkbox.checked);
        }

    });
</script>

@endsection
