# Tejelanas Vivi - Backend API

Proyecto desarrollado para la asignatura BACKEND, correspondiente a la entrega EVA3. Este backend permite la gestión de productos, FAQs, mensajes de contacto e información institucional para el sitio web de Tejelanas Vivi.

## Integrantes

- Efren Tovar Silva - RUT: 25.698.445-8  
- Eduardo Ahumada Catalan - RUT: 17.304.258-2  
- Profesor: Iván Bilbao

## Estructura del Proyecto

/backend/
  ├── api/
  │   ├── productos/
  │   │   ├── productos_GET.php
  │   │   ├── productos_POST.php
  │   │   ├── productos_PUT.php
  │   │   ├── productos_PATCH.php
  │   │   └── productos_DELETE.php
  │   ├── FAQ/
  │   ├── contacto/
  │   └── QuienesSomos/
  ├── swagger.yaml
  └── database/

## Tecnologías Utilizadas

- PHP: Backend funcional con conexión a base de datos MySQL.
- OpenAPI 3.0: Documentación de la API en swagger.yaml.
- Postman: Colección para pruebas de las rutas CRUD.
- MySQL: Base de datos relacional para persistencia de datos.

## Endpoints Principales

### Productos
- GET /productos/productos_GET.php
- POST /productos/productos_POST.php
- PUT /productos/productos_PUT.php
- PATCH /productos/productos_PATCH.php
- DELETE /productos/productos_DELETE.php

### FAQ
- GET /productos/FAQ_GET.php
- POST /productos/FAQ_POST.php
- PUT /productos/FAQ_PUT.php
- PATCH /productos/FAQ_PATCH.php
- DELETE /productos/FAQ_DELETE.php

### Contacto
- GET /productos/contacto_GET.php
- POST /productos/contacto_POST.php
- PUT /productos/contacto_PUT.php
- PATCH /productos/contacto_PATCH.php
- DELETE /productos/contacto_DELETE.php

### Quiénes Somos
- GET /productos/QuienesSomos.php
- POST /productos/QuienesSomos_POST.php
- PUT /productos/QuienesSomos_PUT.php
- PATCH /productos/QuienesSomos_PATCH.php
- DELETE /productos/QuienesSomos_DELETE.php

## Documentación API

- Se encuentra en el archivo swagger.yaml.
- Cumple con OpenAPI 3.0 e incluye:
  - Respuestas HTTP (200, 400, 404, 500)
  - Ejemplos en JSON y XML
  - Headers (Cache-Control, Retry-After)
  - Esquemas estructurados (schemas)

## Validación y Buenas Prácticas

- Validación de campos en cada endpoint (uso de isset(), empty(), etc.).
- Manejo de errores y códigos HTTP apropiados.
- Código limpio, separado por entidad y método HTTP.

## Contacto

Para soporte técnico o preguntas sobre el proyecto:

Email: soporte@tejelanasvivi.cl  
Sitio web (ficticio): https://tejelanasvivi.cl

## Requisitos para Ejecutar Localmente

1. Servidor local (ej. XAMPP, Laragon, WAMP).
2. PHP 7.4 o superior.
3. MySQL o MariaDB.
4. Importar base de datos desde el archivo SQL proporcionado.
5. Colocar el proyecto en htdocs o ruta correspondiente.
6. Acceder a la API desde http://localhost/tejelanas_vivi/backend/api.

## Recursos Incluidos

- swagger.yaml: Documentación OpenAPI completa.
- Tejelanas Vivi API.postman_collection_backend.json: Colección Postman para pruebas.
- Informe_Evaluacion_EVA3.pdf: Documento de evaluación del proyecto.
