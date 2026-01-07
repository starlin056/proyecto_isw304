# Proyecto CRUD de Tareas - ISW304

## Descripción General
Este proyecto corresponde a la **Actividad Práctica 4** del curso ISW304 (Desarrollo de Proyectos con Software Libre). Consiste en una aplicación web para gestionar tareas (operaciones CRUD) desarrollada en PHP y conectada a una base de datos MariaDB. Fue desplegada en un servidor Ubuntu 25.10 con Apache como parte del proyecto final del curso.

## Objetivo
Integrar todos los componentes configurados en prácticas anteriores (servidor Linux, base de datos, servidor web) para desplegar una aplicación web funcional y validar su correcto funcionamiento mediante pruebas técnicas.

## Tecnologías Utilizadas
- **Sistema Operativo:** Ubuntu Server 25.10
- **Servidor Web:** Apache 2.4.64
- **Lenguaje:** PHP 8.4
- **Base de Datos:** MariaDB 11.8.3
- **Cliente SSH:** PowerShell con OpenSSH (Windows 11)
- **Transferencia de archivos:** SCP
- **Pruebas de rendimiento:** ApacheBench (ab)

## Estructura del Proyecto
```
proyecto/
├── config/
│   ├── .env          # Configuración de entorno y conexión a BD
│   └── db.php        # Conexión a base de datos
├── public/
│   ├── index.php     # Archivo principal de la aplicación
│   └── estilos.css   # Estilos CSS básicos
├── sql/
│   └── schema.sql    # Script para crear la tabla de tareas
├── LICENSE           # Licencia del proyecto
└── README.md         # Este archivo
```

## Instalación y Configuración

### 1. Transferir archivos al servidor
Desde Windows (PowerShell):
```
scp -r "C:\Users\Pedro urena\Desktop\proyecto" pedro@10.0.0.133:/home/pedro/
```

### 2. Mover al directorio web
En el servidor Ubuntu:
```
sudo mv /home/pedro/proyecto /var/www/html/
```

### 3. Configurar permisos
```
sudo chown -R www-data:www-data /var/www/html/proyecto
sudo find /var/www/html/proyecto -type d -exec chmod 755 {} \;
sudo find /var/www/html/proyecto -type f -exec chmod 644 {} \;
```

### 4. Configurar conexión a base de datos
Editar el archivo `/var/www/html/proyecto/config/.env`:
```
DB_HOST=10.0.0.133
DB_NAME=proyecto_isw304
DB_USER=usuariodatabase
DB_PASS=123456789
DB_CHARSET=utf8mb4
TIMEZONE=America/Santo_Domingo
```

### 5. Crear la base de datos
```
mysql -h 10.0.0.133 -u usuariodatabase -p proyecto_isw304 < /var/www/html/proyecto/sql/schema.sql
```

## Uso de la Aplicación
1. Acceder desde el navegador: `http://[IP_DEL_SERVIDOR]/proyecto/public/`
2. Crear nuevas tareas usando el formulario
3. Ver todas las tareas en la lista
4. Editar o eliminar tareas según sea necesario

## Pruebas Realizadas

### Pruebas Funcionales
- Crear tarea: Funciona correctamente
- Listar tareas: Muestra todas las tareas
- Editar tarea: Permite modificar estado y descripción
- Eliminar tarea: Borra permanentemente

### Pruebas de Rendimiento
Comando usado:
```
ab -n 100 -c 10 http://10.0.0.133/proyecto/public/
```

## Video Demostrativo
Puedes ver el funcionamiento completo de la aplicación en:
https://youtu.be/fNtqHDoMRAY

## Autor
**Pedro Starlin Ureña Cruz**  
Estudiante de la Universidad Abierta para Adultos (UAPA)  
Curso: ISW304 - Desarrollo de Proyectos con Software Libre  
Grupo: 10

## Licencia
Este proyecto está bajo la Licencia MIT. Ver el archivo LICENSE para más detalles.

---
*Proyecto desarrollado como requisito del curso ISW304 - Enero 2026*
