# Utilizamos la imagen base de Ubuntu
FROM ubuntu:latest

# Actualizamos el sistema e instalamos MySQL Server
RUN apt-get update && \
    apt-get install -y mysql-server && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Creamos un volumen para persistir los datos de MySQL
VOLUME /var/lib/mysql

# Exponemos el puerto 3306 para que se pueda acceder a MySQL desde fuera del contenedor
EXPOSE 3306

# Configuramos la base de datos para aceptar conexiones desde cualquier dirección IP
RUN sed -i 's/^\(bind-address\s.*\)/# \1/' /etc/mysql/mysql.conf.d/mysqld.cnf

# Establecemos la contraseña de root de MySQL por defecto (puedes cambiarla según tus preferencias)
ENV MYSQL_ROOT_PASSWORD=12345


# Instalamos y habilitamos el servicio de Apache
RUN apt-get update && \
    apt-get install -y apache2 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    a2enmod rewrite


# Exponemos el puerto 80 para el servicio de Apache
EXPOSE 80

# Eliminamos el archivo de bienvenida de Apache
RUN rm -rf /var/www/html/index.html

#descargamos el repositorio
RUN git clone https://github.com/Has18Live/Proyecto-Sena.git

# Ejecutamos los servicios de MySQL y Apache al iniciar el contenedor
# CMD ["sh", "-c", "/etc/init.d/mysql start && /etc/init.d/apache2 start && tail -f /dev/null"]

# Establecemos un comando predeterminado que se ejecutará cuando se inicie un contenedor basado en esta imagen
CMD ["bash"]