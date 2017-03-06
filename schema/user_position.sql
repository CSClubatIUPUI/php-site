create table if not exists "user_position" (
    "user_id" int not null references "user",
    "position_id" int not null references "position",
primary key("user_id", "position_id"));
