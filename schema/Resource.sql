CREATE TABLE IF NOT EXISTS `Resource` (
    `id` INT(8) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `url` TEXT NOT NULL,
    `image_url` TEXT, -- if null, no image should be displayed
PRIMARY KEY(`id`));
