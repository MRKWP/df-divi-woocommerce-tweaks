plugin_basename=$(basename $(pwd))
version=$1
#clean up
rm -rf /tmp/$plugin_basename;
rm /tmp/$plugin_basename-$1.zip;


cd ..;
cp -r $plugin_basename /tmp;

cd -;
cd /tmp;
rm /tmp/$plugin_basename/sftp-config.json;
rm -rf /tmp/$plugin_basename/vendor/diviframework/update-checker/.git;
rm -rf /tmp/$plugin_basename/docs;
zip -r9 $plugin_basename-$version.zip $plugin_basename -x *.git* -x *.sh -x *.json -x *.xml -x *.dist -x *.lock -x *tests* -x *bin* -x *Gruntfile.js* -x *.gitignore* -x *.distignore* -x *.editorconf*;
rm -rf /tmp/$plugin_basename;

#upload to s3.
rclone mkdir df-s3:diviframework/$plugin_basename;
rclone copy /tmp/$plugin_basename-$version.zip df-s3:diviframework/$plugin_basename;
echo "https://s3-ap-southeast-2.amazonaws.com/diviframework/$plugin_basename/$plugin_basename-$version.zip"
