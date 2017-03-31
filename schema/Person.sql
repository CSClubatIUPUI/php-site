CREATE TABLE IF NOT EXISTS `Person` (
    -- we can't use university ID because the webmaster is not guaranteed to be an IU employee
    `username` VARCHAR(8) NOT NULL,
    `first_name` VARCHAR(255) NOT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
PRIMARY KEY(`username`));
