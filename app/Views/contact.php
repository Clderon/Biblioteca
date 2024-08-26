<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Biblioteca</title>
    <link rel="stylesheet" href="/Biblioteca/public/css/contact.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="home">Inicio</a></li>
                <li><a href="about">Acerca de</a></li>
                <li><a href="services">Servicios</a></li>
                <li><a href="contact">Contacto</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <h1>Contáctanos</h1>
        <section>
            <h2>Información de Contacto</h2>
            <p>Estamos aquí para ayudarte. Puedes comunicarte con nosotros a través de los siguientes medios:</p>
            <ul>
                <li><strong>Teléfono:</strong> +123 456 7890</li>
                <li><strong>Email:</strong> info@biblioteca.com</li>
                <li><strong>Dirección:</strong> Calle Principal 123, Ciudad, País</li>
            </ul>
        </section>
        <section>
            <h2>Formulario de Contacto</h2>
            <form action="enviar_mensaje.php" method="post">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Mensaje:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Enviar Mensaje</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Biblioteca. Todos los derechos reservados.</p>
    </footer>
</body>

</html>