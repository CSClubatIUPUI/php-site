CREATE TABLE IF NOT EXISTS "events" (
    "id" INTEGER PRIMARY KEY AUTO_INCREMENT,
    "start" DATETIME NOT NULL,
    "end" DATETIME NOT NULL,
    "description" TEXT NOT NULL,
    "location" TEXT NOT NULL
);
