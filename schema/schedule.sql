create table if not exists "schedule" (
    "id" serial not null primary key,
    "start" date not null,
    "location" varchar(127) not null,
    "end" date,
    "description" text not null,
unique("start", "location"));
