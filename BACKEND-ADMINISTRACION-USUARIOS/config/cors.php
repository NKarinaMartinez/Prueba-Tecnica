<?php

return [
    'paths' => ['api/*'], // Aquí puedes ajustar las rutas para las que deseas habilitar CORS
    'allowed_methods' => ['*'], // Permite todos los métodos HTTP (GET, POST, etc.)
    'allowed_origins' => ['http://localhost:4200'], // Asegúrate de poner la URL de tu frontend de Angular
    'allowed_headers' => ['*'], // Permite todos los encabezados
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
