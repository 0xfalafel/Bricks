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
VALUES (0, 'admin', 'admin@getmantra.com', 'admin', 'Brick_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES (1, 'tom', 'tom@getmantra.com', 'tom', 'Block_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES  (2, 'ron', 'ron@getmantra.com', 'ron', 'Rain_Browser');

INSERT INTO bricks.users (`id`, `name`, `email`, `password`, `ua`)
VALUES  (3, 'harry', 'harry@getmantra.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mantra');


