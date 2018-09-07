CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTO_INCREMENT,
    "username" VARCHAR(8) NOT NULL UNIQUE,
    "first_name" TEXT NOT NULL,
    "last_name" TEXT NOT NULL,
    "email" TEXT NOT NULL
);
