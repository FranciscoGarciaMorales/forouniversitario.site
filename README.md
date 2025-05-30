# forouniversitario.site

Foro Universitario es una plataforma web desarrollada como parte de un proyecto académico por estudiantes de desarrollo web. Permite a los usuarios interactuar mediante publicaciones organizadas por temas de interés, con funciones modernas como búsqueda avanzada, modo oscuro, y configuración de perfil.

## Desarrollado por

- Francisco Garcia-morales
- Carlos Lanza
- Iker Idiaquez
- Yuriko Tasaico

## Descripción general

Esta aplicación funciona **localmente** con XAMPP y también se encuentra **disponible en un servidor público** para pruebas y demostraciones de algunas funcionalidades (no post, no temas ni contacto).

## Funcionalidades
Registro de nuevos usuarios  
Inicio de sesión y cierre de sesión  
Configuración y personalización del perfil  
Publicación de posts con títulos, contenidos y temas de interés (localmente) 
Buscador de posts por palabra clave en el título   
Filtrado de publicaciones por categoría/tema  
Visualización de publicaciones más repetidas (tendencias)  
Frase del día que se actualiza diariamente  
Modo claro y modo oscuro 
Envio de mail a la web mediante hostinger (localmente)

##  Tecnologías usadas

- PHP
- MySQL
- HTML5 + CSS3
- JavaScript
- Bootstrap
- Librerias phpmailer
- XAMPP para entorno local
- Git + GitHub para control de versiones

##  Instalación local

1. Clona este repositorio en tu carpeta `htdocs` de XAMPP:

   ```bash
   git clone https://github.com/FranciscoGarciaMorales/forouniversitario.site.git
2. Inicia Apache y MySQL desde XAMPP.

3. Importa el archivo de base de datos (forouniversitario.sql) desde phpMyAdmin.

4. Abre tu navegador y visita:

## Estructura basica del proyecto

/forouniversitario.site

index              # Home del proyecto
assets/            # CSS, JS, imágenes
config/            # Configuración del sistema
controladores/     # Lógica del lado del servidor (MVC)
modelos/           # Clases de base de datos (usuarios, publicaciones)
vistas/            # Interfaces y vistas del usuario
inc/               # Fragmentos como header, footer
README.md          # Este archivo
