#!/bin/bash
cp -a ../app/public/wp-content/plugins/. public/wp-content/plugins/
cp -a ../app/public/wp-content/themes/. public/wp-content/themes/

rm -rf ../app/public/wp-content/plugins
rm -rf ../app/public/wp-content/themes

windows() { [[ -n "$WINDIR" ]]; }

if windows; then
  cmd <<< "mklink /j \"../app/public/wp-content/plugins\" \"public/wp-content/plugins\"" > /dev/null
  cmd <<< "mklink /j \"../app/public/wp-content/themes\" \"public/wp-content/themes\"" > /dev/null
else
  ln -fs "`pwd`/public/wp-content/plugins" ../app/public/wp-content/plugins
  ln -fs "`pwd`/public/wp-content/themes" ../app/public/wp-content/themes
fi
