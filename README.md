# proyecto_isw304

---

```markdown
# Proyecto CRUD de Tareas – ISW304

## 📌 Descripción
Este proyecto corresponde a la **Actividad Práctica 4** del curso ISW304.  
Consiste en el despliegue de una aplicación web CRUD (Crear, Leer, Actualizar, Eliminar) para la gestión de tareas, desarrollada en **PHP** y conectada a una base de datos **MariaDB**, sobre un servidor **Ubuntu 25.10** con **Apache**.

El objetivo principal fue integrar todas las capas de infraestructura (SO, servidor web, base de datos) y validar su funcionamiento mediante pruebas funcionales y de rendimiento.

---

## ⚙️ Tecnologías utilizadas
- **Sistema Operativo:** Ubuntu Server 25.10  
- **Servidor Web:** Apache 2.4.64  
- **Lenguaje:** PHP 8.4 con módulo MySQL  
- **Base de Datos:** MariaDB 11.8.3  
- **Cliente SSH/SCP:** PowerShell con OpenSSH en Windows 11  
- **Pruebas de rendimiento:** ApacheBench (ab)

---

## 📂 Estructura del proyecto
```
proyecto/
├── config/
│   ├── .env
│   └── db.php
├── public/
│   ├── index.php
│   └── estilos.css
├── sql/
│   └── schema.sql
├── LICENSE
└── README.md
```

---

## 🚀 Instalación y despliegue

### 1. Transferencia de archivos
Desde Windows:
```powershell
scp -r "C:/Users/Pedro urena/Desktop/proyecto" pedro@10.0.0.133:/home/pedro/
```

En Ubuntu:
```bash
sudo mv /home/pedro/proyecto /var/www/html/
```

### 2. Permisos
```bash
sudo chown -R www-data:www-data /var/www/html/proyecto
sudo find /var/www/html/proyecto -type d -exec chmod 755 {} \;
sudo find /var/www/html/proyecto -type f -exec chmod 644 {} \;
```

### 3. Configuración de entorno
Archivo `/var/www/html/proyecto/config/.env`:
```ini
DB_HOST=10.0.0.133
DB_NAME=proyecto_isw304
DB_USER=usuariodatabase
DB_PASS=123456789
DB_CHARSET=utf8mb4
TIMEZONE=America/Santo_Domingo
```

### 4. Base de datos
```bash
mysql -h 10.0.0.133 -u usuariodatabase -p proyecto_isw304 < /var/www/html/proyecto/sql/schema.sql
```

