FROM php:7.4-apache

# เปิดใช้งาน Apache mod_rewrite
RUN a2enmod rewrite

# ติดตั้งส่วนขยาย mysqli
RUN docker-php-ext-install mysqli

# คัดลอกไฟล์ PHP ไปยังไดเรกทอรีรากของเว็บ Apache
COPY . /var/www/html

# สร้างไดเร็กทอรีสำหรับการอัพโหลดและดาวน์โหลด
RUN mkdir /var/www/html/uploads /var/www/html/

# ตั้งค่าการอนุญาตสำหรับไดเร็กทอรีอัพโหลดและดาวน์โหลด
RUN chown -R www-data:www-data /var/www/html/uploads /var/www/html/

# เปิดเผยพอร์ต 80 เพื่ออนุญาตการเข้าถึงจากภายนอก
EXPOSE 80
