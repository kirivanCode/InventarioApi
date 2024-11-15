<?php

// config/cors.php
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Define las rutas en las que CORS está activo
    
    'allowed_methods' => ['*'], // Permite todos los métodos HTTP (GET, POST, PUT, DELETE, etc.)
    
    'allowed_origins' => ['*'], // Permite todas las URLs de origen (útil para desarrollo). Para producción, especifica dominios específicos.
    
    'allowed_origins_patterns' => [], // Puedes definir patrones de URL específicos si es necesario
    
    'allowed_headers' => ['*'], // Permite todos los encabezados HTTP. Puedes especificar encabezados específicos si lo deseas.
    
    'exposed_headers' => [], // Define los encabezados que se pueden exponer en la respuesta, si es necesario
    
    'max_age' => 0, // Tiempo de caché de la solicitud de pre-vuelo en segundos. "0" desactiva el caché.
    
    'supports_credentials' => false, // Define si se permiten las cookies y las credenciales
];
