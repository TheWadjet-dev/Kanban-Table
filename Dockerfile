# Usar una imagen oficial de Node.js como base para ejecutar TypeScript y el servidor web
FROM node:18

# Crear un directorio para la aplicación
WORKDIR /app

# Copiar los archivos package.json y package-lock.json (si los tienes)
COPY package*.json ./

# Instalar dependencias de Node (como http-server para servir los archivos estáticos)
RUN npm install -g typescript http-server

# Copiar el código fuente de la aplicación al contenedor
COPY . .

# Compilar el código TypeScript a JavaScript
RUN tsc

# Exponer el puerto que usaremos para servir la aplicación
EXPOSE 8080

# Usar http-server para servir la aplicación una vez compilada
CMD ["http-server", "dist", "-p", "8080"]
