create table if not exists "page_content" (
    "page" varchar(31) not null,
    "name" varchar(127) not null,
    "value" text not null,
primary key("page", "name"));
