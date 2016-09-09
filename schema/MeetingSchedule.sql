CREATE TABLE IF NOT EXISTS `MeetingSchedule` (
    `start` DATETIME NOT NULL,
    `end` DATETIME NOT NULL,
    `description` TEXT NOT NULL,
    `location` VARCHAR(255) NOT NULL,
PRIMARY KEY(`start`));
