# LaravelVuejsMarcosAlberto


test de prueba realizada en el siguiente link 

[Evaluación técnica Laravel + Vuejs](https://www.notion.so/Evaluaci-n-t-cnica-Laravel-Vuejs-67af257c20d145b19e9457854cd8df45)

https://www.notion.so/Evaluaci-n-t-cnica-Laravel-Vuejs-67af257c20d145b19e9457854cd8df45

El objetivo de la prueba es evaluar las capacidades técnicas en las tecnologías Laravel & Vuejs. A continuación los detalles de la prueba.

### **¿Que se necesita?**

Crear la estructura de una aplicación como Twitter, con sistema de autenticación y modelo CRUD (Create, Read, Update, Delete) de Tweets.

### Antes de comenzar

Si tienes dudas en el proceso o te atascas haciendo alguna parte de la prueba, puedes escribir via WhatsApp a Daniel Hernández al **3219027891**. El estará atento en el proceso para cualquier problema que se les presente.

Al generar el proyecto de Laravel, recuerde inicializar el repositorio de GIT para subirlo a GitHub o GitLab al finalizar la prueba y proceder a su evaluación alli. Recuerde usar siempre las migraciones para cualquier modificacion en la Base de Datos y no modificar directamente la estructura.

### Estructura del front-end

El manejo de front-end se puede realizar con la libreria o framework de su preferencia, pero se valorará mucho el uso de Vue.js

1. Generar las vistas de autenticación (Registro e Inicio de Sesión) usando el metodo automático por defecto de Laravel
2. Reutilizar la vista Home que viene por defecto en Laravel. Puede comenzar solo creando el HTML y el estilo de la interfaz y usando el codigo estáticamente para previsualizar.
    1. En esta debe ir al principio un card de Bootstrap, con un <textarea> para escribir un nuevo tweet y un <button> para publicarlo
    2. Despues de esa card, deben ser mostrados los tweets cargados desde el endpoint index del TweetController, organizados desde los mas recientes, para este punto se puede usar codigo HTML estático para previsualizar.
    3. En cada tweet se debe mostrar el autor, el texto escrito por el autor, la fecha de publicación y si el usuario autenticado es el mismo autor del tweet, las opciones para Borrar y Editar el tweet. Nuevamente puede comenzar solo con HTML estático para previsualizar.
    4. El estilo de diseño o colores se deja a libertad y gusto del programador, puede usar el estilo, tamaños y tipografía que prefiera
    5. Al finalizar este punto por favor enviar el avance de la interfaz a Daniel Hernández

3. Una vez ya tenga el Controlador del Modelo Tweet hecho entonces:
    1. Los tweets ordenados desde los mas recientes se deben cargar a traves del endpoint 'index' del TweetController con GET y usando Fetch, Axios o AJAX. 
    [https://laravel.com/docs/7.x/csrf#csrf-x-csrf-token](https://laravel.com/docs/7.x/csrf#csrf-x-csrf-token)
    2. Al hacer click al botón publicar tweet se debe enviar la data a traves del endpoint 'store' del TweetController usando el metodo POST. Se puede usar Fetch, Axios o AJAX

### Estructura del back-end

1. Modelo 'User' con Autenticación (usar Modelo por defecto de Laravel)
    1. El modelo User debe tener una relación hasMany dirigida a los modelos Tweet relacionados en la base de datos
2. Modelo Tweet basado en las siguientes especificaciones
    1. Generar la migración de la tabla en la base de datos con la siguiente estructura: 
        - Columna 'id', la clave primaria
        - Columna 'content', texto del tweet del usuario
        - Columna 'user_id', clave foránea vinculada al id del usuario
        - Columna 'created_at', con la fecha de creación
        - Columna 'updated_at', con la fecha de actualización

    2. El modelo Tweet debe tener un Controlador de tipo recurso, si tiene dudas consulte [https://laravel.com/docs/7.x/controllers#resource-controllers](https://laravel.com/docs/7.x/controllers#resource-controllers)
    3. En el Controlador de tipo de recurso, los endpoints index, show, store, update y remove deben funcionar correctamente
        - El endpoint index debe devolver todos los tweets almacenados en la base de datos ordenados desde los mas recientes
        - El endpoint show debe devolver el tweet desde el id correspondiente enviado por la url
        - El endpoint store, de tipo POST debe crear el tweet en la base de datos
        - El endpoint update, de tipo PUT debe reemplazar el tweet en la base de datos, correspondiente al id enviado por url
        - El endpoint remove, de tipo DELETE debe eliminar el tweet de la base de datos correspondiente al id enviado por url

    4. El modelo Tweet debe tener una relación hasOne dirigida al modelo User relacionado
3. Usar Seeders y Fakers para generar usuarios y tweets como datos de prueba
[https://laravel.com/docs/7.x/seeding#writing-seeders](https://laravel.com/docs/7.x/seeding#writing-seeders)

### Notas finales

A continuación se mencionan algunos detalles que si bien, no son necesarios, se valorará mucho si se llegaran a realizar:

1. Uso de Data Binding en los controladores y respectivos endpoints que sea posible usarlos
[https://laravel.com/docs/7.x/routing#route-model-binding](https://laravel.com/docs/7.x/routing#route-model-binding)
2. Uso de Validación de datos en los endpoints del TweetController
3. Manejo de Vue.js en conjunto con las vistas Blade de Laravel, para enviar datos a los componentes de Vue, o para obtener el usuario Autenticado en Vuejs
4. Endpoint index del TweetController devuelva los datos paginados y se use lazy load, o carga al hacer scroll en la vista los tweets
5. Al hacer click al botón publicar se agregue automáticamente de primero en la lista el tweet publicado por el usuario
6. Uso de GIT para hacer commits en las modificaciones que el desarrollador vea necesario (Ejemplo: al generar las migraciones, modificar los diferentes Modelos, instalaruna dependencia o terminar una funcionalidad)
7. Uso de Logs en Laravel en los Controladores

 
 
 
 https://www.npmjs.com/package/vue-toastr-2
 
 composer install 
 
 npm install
 
 npm run watch 
 
 php artisan migrate:fresh

 
 se recomienda install la siguiente version 
 en caso de que salga error 
 npm i bootstrap-vue@2.10.1


npm i laravel-vue-pagination

npm install jquery

npm install toastr

npm install vue-toastr-2
 
php artisan migrate:fresh
 
 
 
 
