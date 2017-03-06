create table if not exists "position" (
    "id" serial not null primary key,
    "name" varchar(32) not null,
    "rank" int not null
);
