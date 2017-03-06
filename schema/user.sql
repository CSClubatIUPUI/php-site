create table if not exists "user" (
    -- we can't use university ID because the webmaster is not guaranteed to be an IU employee
    "id" serial not null primary key,
    "username" char(8) not null,
    "first_name" varchar(63) not null,
    "last_name" varchar(63) not null,
    "email" varchar(127) not null
);
