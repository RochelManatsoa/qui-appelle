cd
l
wget https://fr.wordpress.org/latest-fr_FR.tar.gz
l
tar xvzf latest-fr_FR.tar.gz 
rm latest-fr_FR.tar.gz 
mv wordpress/* .
l wordpress/
rm -rf wordpress/
l
chown -R quiappelleptfr:apache ../quiappelleptfr/
chmod  -R g+x ../quiappelleptfr/
l
chmod  -R g+w ../quiappelleptfr/
l
cd
cd /etc/
l
cd httpd/
l
cd conf.d/
l
cp wp118001ptfr.conf quiappelleptfr.conf
exit
