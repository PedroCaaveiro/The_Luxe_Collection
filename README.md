## The Luxe Collection

# Descripción

# The Luxe Collection es un proyecto web desarrollado con un enfoque en realizar un  diseño elegante y optimizado para tener un buen  rendimiento. Utiliza una combinación de tecnologías modernas para garantizar una experiencia fluida y visualmente atractiva.

# Tecnologías utilizadas

# HTML: Estructura de las páginas web.

# SCSS: Preprocesador CSS para una mejor organización y reutilización de estilos.

# Gulp: Automatización de tareas como la compilación de SCSS, optimización de imágenes y recarga en # vivo.

# JavaScript: Interactividad y funcionalidades dinámicas.

# PHP: Lógica del servidor y gestión de contenido dinámico.

# Estructura de carpetas

# The-Luxe-Collection/
# |-- admin/
# |     |-- index.php       #pagina index para gestion activos 
# |     |-- propiedades--|
# |                      |-- actualizar.php  pagina para actualizar propiedades
# |                      |-- crear.php      pagina para crear propieades
# |                      |-- funciones.php  pagina con logica funciones SCRUD
# |                      
# |-- build/
# |     |-- css/
# |           |-- app  pagina stilos css
# |           |-- app.css.map configuracion css
# |           |--layout/
# |                 |--admin  archivo configuracion
# |                 |--admin.css.map archivo configuración
# |               
# |-- esquema_bbdd/
# |         |
# |         |-- the_luxe_collection.sql  archivo base de datos      
# |
# |-- imagenes/-- carpeta con imagenes generar x crear.php / actualizar.php
# |        
# |-- includes/
# |     |-- config/
# |     |       |-- database.php  archivo configuracion conexión base de datos 
# |     |
# |     |-- templates/
# |             |-- anuncios.php  template anuncios
# |             |-- app.php ruta para acceder templates
# |             |-- footer.php template footer
# |             |-- funciones.php ruta para acceder a templates
# |             |-- header.php template header
# |        
# |-- node_modules/-- configuraciones proyecto
# |
# │-- src/                   
# │   │-- scss--|          
# |   |         |-- base/    # Archivos SCSS estilos globales   
# |   |         |-- layout/  # Archivos SCSS estilos locales   
# │   │-- js/   |            # Scripts JavaScript
# │   │-- img/               # Imágenes del proyecto para Pruebas
# |           
# │-- gulpfile.js            # Configuración de Gulp
# │-- package.json           # Dependencias y configuración del proyecto
# │-- index.html             # Archivo principal de la página
# |-- anuncio.php            # Archivo anuncio 
# |-- anuncios.php           # Archivo anuncios
# |-- blog.php               # Archivo blog
# |-- cerrarSesion.php       # Archivo cerrar sesion
# |-- contacto.php           # Archivo contacto
# |-- entrada_1php           # Archivo entrada blog 1
# |-- entrada_2.php          # Archivo entrada blog 2
# |-- entrada_3.php          # Archivo entrada blog 3
# |-- entrada_4.php          # Archivo entrada blog 4
# |-- login.php              # Archivo login
# |-- nosotros.php           # Archivo nosotros
# |-- usuario.php            # Archivo usuario

# Requisitos 

# Instalar Node.js (para ejecutar Gulp)
# Instalar  Gulp CLI instalado globalmente (npm install -g gulp-cli)
# Servidor de desarrollo integrado (php -S localhost:3000)

 # Instalación

# 1 Clonar el repositorio

# git clone https://github.com/PedroCaaveiro/The_Luxe_Collection.git

# 2 Instalar dependencias del proyecto:

# npm install

# 3 Compilar SCSS y ejecutar Gulp:

# gulp

# 4 Iniciar servidor PHP

# php -S localhost:3000

# Autor

# 👤 Pedro Caaveiro Moncadas
# 📧 Contacto: pedro.caaveiro.moncadas@gmail.com