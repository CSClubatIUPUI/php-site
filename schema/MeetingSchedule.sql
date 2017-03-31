CREATE TABLE IF NOT EXISTS `MeetingSchedule` (
    `id` INT(8) NOT NULL AUTO_INCREMENT,
    `start` DATETIME NOT NULL,
    `end` DATETIME NOT NULL,
    `description` TEXT NOT NULL,
    `location` VARCHAR(255) NOT NULL,
PRIMARY KEY(`id`));
