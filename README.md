# Sistema de Gestión de Propuestas para Corpocarnaval

Este proyecto es una aplicación web desarrollada en Laravel para la gestión de propuestas en carnavales, específicamente para Corpocarnaval de San Juan de Pasto. La aplicación permite a los usuarios registrar, gestionar y evaluar las propuestas presentadas para el evento.
![Imagen](https://raw.githubusercontent.com/Miller-Jaramillo/PropuestasCarnavalApp/main/public/img/corpocarnaval1.png)
![Imagen](https://raw.githubusercontent.com/Miller-Jaramillo/PropuestasCarnavalApp/main/public/img/corpocarnaval2.png)
## Características

- **Registro de Propuestas:** Los usuarios pueden registrar nuevas propuestas, incluyendo detalles como nombre del grupo, descripción, categoría, y archivos adjuntos como imágenes o videos.
- **Gestión de Propuestas:** Los administradores pueden revisar, eliminar o aprobar las propuestas registradas, así como asignarles un estado de revisión.
- **Evaluación de Propuestas:** Los evaluadores pueden acceder a las propuestas asignadas, evaluarlas según criterios predefinidos y dejar comentarios para los proponentes.
- **Notificaciones:** La aplicación envía notificaciones automáticas por correo electrónico a los usuarios cuando hay cambios en el estado de sus propuestas.
- **Feed de Noticias:** Las propuestas aprobadas por los evaluadores son publicadas autamitacamente en feed de noticias de la app, los demas participantes pueden reaccionar a estas publicaciones y dejar sus comentarios.

![Imagen](https://raw.githubusercontent.com/Miller-Jaramillo/PropuestasCarnavalApp/main/public/img/corpocarnaval5.png)

## Tecnologías Utilizadas

- **Laravel:** El framework PHP utilizado para el desarrollo del backend de la aplicación.
- **Livewire:** Una librería de Laravel para el desarrollo de componentes interactivos en tiempo real.
- **Tailwind CSS:** Un framework CSS utilizado para el diseño y estilización de la interfaz de usuario.

## Instalación

1. Clona el repositorio: `git clone https://github.com/tu_usuario/corpocarnaval-app.git`
2. Instala las dependencias: `composer install`
3. Copia el archivo de configuración: `cp .env.example .env`
4. Genera la clave de aplicación: `php artisan key:generate`
5. Configura la base de datos en el archivo `.env`
6. Ejecuta las migraciones: `php artisan migrate`
7. Inicia el servidor de desarrollo: `php artisan serve`

## Contribución

Si deseas contribuir al proyecto, sigue estos pasos:

1. Crea un fork del repositorio.
2. Crea una nueva rama para tu función: `git checkout -b feature/nueva-funcion`
3. Haz tus cambios y haz commit: `git commit -am 'Agrega nueva función'`
4. Sube tus cambios a tu repositorio: `git push origin feature/nueva-funcion`
5. Crea un pull request en el repositorio original.

## Créditos

Desarrollado por [Tu Nombre](https://github.com/tu_usuario).

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE.md](LICENSE) para más detalles.

---

Por supuesto, asegúrate de personalizar este README con la información específica de tu aplicación y ajustarla según tus necesidades.
