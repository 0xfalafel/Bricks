ALTER USER 'root'@'localhost' IDENTIFIED with mysql_native_password;
ALTER USER 'root'@'localhost' IDENTIFIED BY 'root'; 

CREATE DATABASE bricks;

CREATE TABLE bricks.users (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `ua` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`)
);

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES (0, 'admin', 'admin@getmantra.com', 'S3cr3t_p4ssw0rd!', 'Brick_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES (1, 'tom', 'tom@getmantra.com', 'Strawberry<3', 'Block_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES  (2, 'ron', 'ron@getmantra.com', 'D4rk_v4d0+0r!', 'Rain_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES  (3, 'harry', 'harry@getmantra.com', 'bd35bb2a012ddadfccf23157d8e6d530', 'Mantra');


