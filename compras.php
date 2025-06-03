<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/citas-compras.css">
</head>
<body>
    <div class="citas-container">
        <h3>Solicitud de compras</h3>
        <p>Llena el formulariol de compra de pruductos, seleccionar una o vario de los pruductos y accesorios que tenemos disponibles para ti.</p>
        <div>
            <div>
                <label for="">Nombre completo</label>
                <input type="text" class="nom" id="nom" placeholder="nombre completo" required>
            </div>
            <div>
                <label for="">telefono</label>
                <label for="">COrreo Electrónico</label>
            </div>
            <div>
                <input type="text" class="tel" id="tel" placeholder="Teléfono" required>
                <input type="email" class="email" id="email" placeholder="Correo Electrónico" required>
            </div>
            <div>
                <label for="">DIrección</label>
                <label for="">NIT</label>
            </div>
            <div>
                <input type="text" class="dic" id="dic" placeholder="Dirección" required>
                <input type="text" class="nit" id="nit" placeholder="NIT" required>
            </div>
            <div>
                <label for="">Productos Seleccionados</label>
                <select name="age" id="age" class="datoslocal" required>
                <option value="">--Seleccione uno o varios productos--</option>
                <option value="CarByte La República">Rines Deportivos</option>
                <option value="CarByte Las Américas">Tapicería Premium</option>
                <option value="CarByte CA Salvador">Alfombrilla</option>
                <option value="CarByte Santa Fe">Película Polarizada</option>
                <option value="CarByte Zona 10">Sensores de Reversa</option>
                <option value="CarByte La República">Sistema de Navegación GPS</option>
                <option value="CarByte Las Américas">Portabicicletas</option>
                <option value="CarByte CA Salvador">Cargador Inalámbrico</option>
                <option value="CarByte Santa Fe">Fundas para Asientos</option>
                <option value="CarByte Zona 10">Protector de Cajuela</option>
                <option value="CarByte La República">Deflectores de Viento</option>
                <option value="CarByte Las Américas">Sistema de Alarma/option>
                <option value="CarByte CA Salvador">Rastreador Satelital</option>
                <option value="CarByte Santa Fe">Kit de Seguridad</option>
                <option value="CarByte Zona 10">Luces LED Personalizadas</option>
            </select>
            </div>
            <div>
                <label for="">Precio por productoos</label>
                <select name="age" id="age" class="datoslocal" required>
                <option value="">--precios seleccionardos--</option>
                <option value="CarByte La República">Q50</option>
                <option value="CarByte Las Américas">Q100/option>
                <option value="CarByte CA Salvador">Q560</option>
                <option value="CarByte Santa Fe">Q250</option>
                <option value="CarByte Zona 10">Q150</option>
                <option value="CarByte La República">Q125</option>
                <option value="CarByte Las Américas">Q100</option>
                <option value="CarByte CA Salvador">Q150</option>
                <option value="CarByte Santa Fe">Q90</option>
                <option value="CarByte Zona 10">Q30</option>
                <option value="CarByte La República">Q150</option>
                <option value="CarByte Las Américas">Q75</option>
                <option value="CarByte CA Salvador">Q150</option>
                <option value="CarByte Santa Fe">Q150</option>
                <option value="CarByte Zona 10">Q85</option>
            </select>
            </div>
            <div>
                <label for="">Precio por productoos</label>
                <select name="age" id="age" class="datoslocal" required>
                <option value="">--Seleccione forma de pago--</option>
                <option value="CarByte La República">Efectivo</option>
                <option value="CarByte La República">Tarjeta</option>
                </select>
            </div>
            <div>
                <label for="">Comentario del pedido</label>
                <textarea name="coment" id="coment" placeholder="Añadir comentarios"></textarea>
            </div>
        </div>
    </div>
</body>
</html>