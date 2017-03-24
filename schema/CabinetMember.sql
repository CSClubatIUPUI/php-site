CREATE TABLE IF NOT EXISTS `CabinetMember` (
    `username` VARCHAR(8) NOT NULL,
    `position` VARCHAR(255) NOT NULL,
    `rank` INT(8) NOT NULL,
PRIMARY KEY(`username`));
