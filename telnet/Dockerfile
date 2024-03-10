FROM php:7.4-cli

# Install telnet extension
RUN apt-get update && apt-get install -y telnet

# Set working directory
WORKDIR /PHP

# Copy PHP files into the container
COPY PHP/index.php .

# Expose port 8080
EXPOSE 8080

# Start PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080"]