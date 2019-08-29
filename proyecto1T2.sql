CREATE DATABASE BK_PCM

USE BK_PCM

CREATE TABLE product(
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) NOT NULL,
	price int NOT NULL,
	description varchar(200),
	image varchar(200),
	idProvider int NOT NULL
)



INSERT INTO product (name, price, description, image, idProvider) 
VALUES
 (
	'PC AMD',
	 148000,
	 'RYZEN 3 3200G - 8 GB RAM',
	 'public/imgs/p5.jpg',
	 2
), (
	'PC INTEL',
	 205000,
	 'CORE I5 9400F - 8 GB RAM',
	 'public/imgs/p6.jpg',
	 2
), (
	'XTREMEPC SENTRY',
	 210000,
	 'Procesador: Intel Pentium G5400 - Tarjeta Madre: Asrock H310M - Memoria: 8 GB DDR4 2400 - Tarjeta de Video: AMD Radeon RX 550 2 GB - Disco SSD: 240 GB ',
	 'public/imgs/p3.jpg',
	 2
),(
	'XTREMEPC LEVEL 1 - INTEL - RGB',
	 265000,
	 'Procesador: Intel Core i3 9100F - Tarjeta Madre: Asrock H310M - Memoria: 8 GB DDR4 2400 - Tarjeta de Video: AMD Radeon RX 570 4 GB - Disco SSD: 240 GB',
	 'public/imgs/p2.jpg',
	 2
),(
	'XTREMEPC LEVEL 2 - INTEL',
	 290000,
	 'Procesador: Intel Core i3 9100F - Tarjeta Madre: Asrock H310M - Memoria: 8 GB DDR4 2400 - Tarjeta de Video: AMD Radeon RX 570 4 GB - Case: Phanteks Eclipse P300 - Vidrio Temperado',
	 'public/imgs/p1.jpg',
	 2
),(
	'XTREMEPC LEVEL 3 - AMD',
	 430000,
	 'Procesador: AMD Ryzen 5 3600 - Tarjeta Madre: Asrock B450M-HDV - Memoria: 8 GB DDR4 2666 - Tarjeta de Video: AMD Radeon RX 590 8 GB - Disco Duro: 1 TB 7200 RPM',
	 'public/imgs/p4.jpg',
	 2
)

CREATE PROCEDURE sp_getProducts()
	SELECT * FROM product

DELIMITER $$ 
CREATE PROCEDURE sp_registerProduct(nameP varchar(50), priceP int , descriptionP varchar(200), path varchar(200))
	BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
    
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
	START TRANSACTION; 
    INSERT INTO product (name, price, description, image, idProvider) 
    values(nameP, priceP, descriptionP, path, 1);    
    COMMIT;
    
   END
   
   DELIMITER $$ 
CREATE PROCEDURE sp_updateProduct(idA int, nameP varchar(50), priceP int , descriptionP varchar(200))	
BEGIN
 DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    START TRANSACTION; 
	UPDATE product
    SET name = nameP,
    price = priceP,
    description = descriptionP
    WHERE id = idA;    
	COMMIT;
END

 DELIMITER $$ 
CREATE PROCEDURE sp_deleteProduct(idP int)	
BEGIN
 DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    START TRANSACTION; 
	DELETE FROM product WHERE id = idP;    
	COMMIT;
END

