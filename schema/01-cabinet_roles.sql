CREATE TABLE IF NOT EXISTS "cabinet_roles" (
  "id" INTEGER PRIMARY KEY AUTO_INCREMENT,
  "user_id" INTEGER REFERENCES "users" ("id"),
  "title" TEXT NOT NULL,
  "rank" INTEGER NOT NULL
);
