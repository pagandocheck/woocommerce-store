# Woocommerce-store v1.0.0

# Guía de Instalación Tienda Woocommerce

## Características
La tienda de ejemplo con Woocommerce contiene una plantilla con algunos productos añadidos en donde se puede visualizar de que manera se puede realizar la configuración de una tienda online. Su contenido abarca una instalación de Wordpress donde se encuentra ubicado Woocommerce, una base de datos precargada con la información de los productos y la pagina de ejemplo con la plantilla de una tienda Pagando.

### Requisitos para una instalación local.
- **PHP 7.4** instalado, como mínimo, en caso de no cumplir con este requerimiento, nosotros sugerimos su actualización a esta versión a través de brew; un instalador de paquetes para macOS que puedes encontrar [aquí](https://brew.sh/index_es).
- **MAMP**.- Un servidor para alojar la página web, puedes encontrarlo [aquí](https://www.mamp.info/en/mac/), pero también puede utilizar otro servidor de su preferencia.

## Instalación

### 1. Instalar MAMP

Lo primero que debe hacer es visitar el sitio web de [MAMP](https://www.mamp.info/en/downloads/) y descargar. Una vez finalizada la descarga:

**Mac**:
Deberá abrir el archivo descargado y arrastrar el archivo de imagen dentro de él a su carpeta de Aplicaciones. A continuación, simplemente siga las instrucciones en pantalla. Después de la instalación, puede continuar e iniciar MAMP desde **Aplicaciones »MAMP** en su computadora.

**Windows**:
Ejecutar el instalador, seguir las instrucciones y abrir la aplicación desde el icono ubicado normalmente en el escritorio.

Antes de comenzar, se recomienda configurar algunos ajustes para mejorar su experiencia con MAMP. Puede hacer esto abriendo el menú Preferencias y luego cambiar a la pestaña de puertos.

![changeapacheport](https://user-images.githubusercontent.com/88348069/128447300-023fbd7e-c5c3-4443-ae15-f6a3c51db855.png)

El siguiente paso es configurar la carpeta raíz del documento. Esta será la carpeta donde creará y almacenará sus sitios web. De forma predeterminada, MAMP usa la carpeta:

**Mac**
```
/ Aplicaciones / MAMP / htdocs /.
```
**Windows**
```
Windows(C:) / MAMP / htdocs /
```

> **_Nota:_**
Puede cambiar la carpeta a una ubicación más accesible.

Para terminar con la instalación de MAMP solo hay que presionar el botón **start** del servidor. Al hacerlo se abrirá la pagina de inicio de MAMP (http://localhost/MAMP/?language=English)

### 2. Clonar el repositorio

```
git clone https://github.com/pagandocheck/woocommerce-store.git
```
Para que se pueda acceder a la tienda, la carpeta del proyecto que se descargó, **woocommerce-store**, deberá quedar ubicada dentro de MAMP, normalmente se encuentra ubicado en **Applications/MAMP** , pegar el proyecto dentro de la carpeta **htdocs**.

### 3. Cargar dump de la base de datos con los productos de ejemplo.
Para importar la base de datos, en el menu superior de la página de inicio de MAMP seleccionar **Tools** y despues **phpMyAdmin**.

En **phpMyAdmin** hacer clic en Bases de datos y luego crear nueva base de datos. Agregar como nombre ***woocommerce***, en caso de que se desee poner otro nombre habrá que cambiar la configuración en el proyecto.

Luego, seleccionar la base de datos, dar clic en el menu **importar** y seleccionar el archivo **woocommerce.sql** de la carpeta [database](https://gitlab.com/pagandocheck/woocommerce-store/-/blob/master/database/woocommerce.sql) de nuestro proyecto, despues dar clic en **importar**. Si se importó de manera satisfactoria podremos ver las tablas de la base de datos.

> **_Nota:_**
Para realizar el cambio del nombre de la base de datos en la configuración , hay que editar el archivo **wp-config.php** y cambiar el campo **DB_NAME** con el nombre que se haya elegido.

### 4. Acceder a la página.
En el navegador ir a http://localhost/woocommerce-store/ para visualizar la tienda con los productos cargados en la base de datos. Debería verse de la siguiente forma: 

<img width="950" alt="Captura de Pantalla 2021-08-05 a la(s) 20 33 11" src="https://user-images.githubusercontent.com/88348069/128447095-2bf718d3-44d4-4b45-b5de-562cef808c27.png">

### 6. Acceder al panel de administración.
En el panel de administración se muestran los diferentes menu con opciones para configurar la tienda de Woocommerce, éste demo incluye un plugin de Pagando check activado que muestra dicho método de pago en la tienda.
Ingrese en la siguiente liga: http://localhost/woocommerce-store/wp-login.php para tener acceso al panel de administración. Las contraseñas por default son:

username: demo

password: demo

<img width="1438" alt="Captura de Pantalla 2021-08-20 a la(s) 9 12 50" src="https://user-images.githubusercontent.com/88348069/130246853-f2d1f63c-5157-46ef-a715-a45e4a9cc33e.png">

