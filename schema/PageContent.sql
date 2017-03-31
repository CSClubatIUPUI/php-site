CREATE TABLE IF NOT EXISTS `PageContent` (
    `page` VARCHAR(31) NOT NULL,
    `name` VARCHAR(255) NOT NULL,
    `value` TEXT NOT NULL,
PRIMARY KEY(`page`, `name`));
