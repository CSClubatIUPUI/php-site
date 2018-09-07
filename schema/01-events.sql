CREATE TABLE IF NOT EXISTS "events" (
    "id" INTEGER PRIMARY KEY AUTO_INCREMENT,
    "created_by" INTEGER REFERENCES "users" ("id"),
    "start" DATETIME NOT NULL,
    "end" DATETIME NOT NULL,
    "description" TEXT NOT NULL,
    "location" TEXT NOT NULL
);
