Bienvenido al test Laravel de Adoclic
Para completar este ejercicio de prueba de Laravel, sigue los siguientes pasos:

Instalación de Laravel
Instala Laravel Framework 10.
Utiliza una base de datos MySQL.
Creación de los modelos de datos
Crea dos modelos de datos: Entity y Category.
Define las propiedades de cada modelo según las siguientes especificaciones:
Entity:

id
api
description
link
category_id
Category:

id
category
Creación del seeder para categorías
Crea un seeder para insertar las categorías "Animals" y "Security" en la tabla de categorías.
Utiliza el seeder para poblar la tabla con los registros correspondientes.
Creación del servicio para consultar la API
Crea un servicio que consulte la siguiente API: https://api.publicapis.org/entries.
Extrae las entidades de las categorías "Animals" y "Security" de la respuesta obtenida.
Inserta las entidades obtenidas en la tabla de entidades en la base de datos.
Utiliza controladores, migraciones, recursos (resources), etc., según consideres necesario.
Creación de la API
Crea una API en la siguiente ruta: {SITE_URL}/api/{category}.
Esta API debe consultar la base de datos y devolver los datos en formato JSON con la siguiente estructura:
{
    "success": true,
    "data": [
        {
            "api": "Application Environment Verification",
            "description": "Android library and API to verify the safety of user devices, detect rooted devices and other risks",
            "link": "https://github.com/fingerprintjs/aev",
            "category": {
                "id": 1,
                "category": "Security"
            }
        },
        {
            "api": "BinaryEdge",
            "description": "Provide access to BinaryEdge 40fy scanning platform",
            "Auth": "apiKey",
            "link": true,
            "category": {
                "id": 1,
                "category": "Security"
            }
        },
        ...
    ]
}
Recuerda ajustar {SITE_URL} con la URL correspondiente a tu aplicación.

Pruebas Unitarias
Escribe pruebas unitarias para los modelos Entity y Category para asegurar su correcto funcionamiento y validación de datos.
Implementa pruebas para el servicio que se conecta a la API https://api.publicapis.org/entries para verificar su capacidad para extraer y almacenar datos correctamente.
Asegúrate de probar la API creada en la ruta {SITE_URL}/api/{category}. Verifica que devuelve datos correctamente y maneja adecuadamente los casos de error.
Utiliza herramientas como PHPUnit para escribir y ejecutar las pruebas unitarias en Laravel.
Documenta cómo ejecutar las pruebas y cómo interpretar los resultados obtenidos.
Este ejercicio busca evaluar tus habilidades en Laravel y la implementación de una API que consulte datos externos y los almacene en una base de datos

Las pruebas unitarias son esenciales para garantizar que tu aplicación Laravel funcione de manera confiable y se comporte como se espera en diferentes escenarios. ¡Éxito con el desarrollo y las pruebas!
