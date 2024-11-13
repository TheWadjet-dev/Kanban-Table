# Use oficial PHP imagen 
FROM php:8.1-cli

# Configuration path
WORKDIR /app

# Copy files in container
COPY . /app

# Listen port 8080 
EXPOSE 8080

# Start service
CMD ["php", "-S", "0.0.0.0:8080", "-t", "/app"]