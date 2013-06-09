app="193.168.0.186/pretty-secure-web-app/controllers/login.php"

for i in `seq 1 $1`
do
	curl -X POST -d "login=hehe&password=hehe" $app
	echo $i
done
