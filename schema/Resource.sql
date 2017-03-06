create table if not exists "resource" (
    "name" varchar(127) not null primary key,
    "url" text not null,
    "image_url" text -- if null, no image should be displayed
);
