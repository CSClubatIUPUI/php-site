#!/bin/bash
for filename in $(php -f ./scripts/get_all.php); do
  php -l "$filename";
done;
