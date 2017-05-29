#!/usr/bin/python

"""
AUTHORS: Prajakta Shinde, Shibani Singh
"""

import sys
import re
from bs4 import BeautifulSoup
import unicodedata
import os, errno

def silentremove(filename):
    try:
        os.remove(filename)
    except OSError as e: # this would be "except OSError, e:" before Python 2.6
        if e.errno != errno.ENOENT: # errno.ENOENT = no such file or directory
            raise # re-raise exception if a different error occured

inputfile = sys.argv[1]
outputfile = sys.argv[2]
phpsetget=set()
phpsetpost=set()
phpsetrequest=set()
phpsetserver=set()
phpsetcookie=set()
phpsetfiles=set()
submitlist=set()
phpsetenv=set()

if '.php' in outputfile:
	silentremove(outputfile)
	out = open(outputfile,'a+')
else:
	silentremove(outputfile)
	out = open(outputfile+'.php', 'a+')

try:
	f = open(inputfile, 'r')
	htmlcontent = f.read()
	soup = BeautifulSoup(htmlcontent, 'html.parser')
	for link in soup.find_all('input'):
		if link.get('type') == 'submit':
			value=unicodedata.normalize('NFKD',link.get('name')).encode('ascii','ignore')
			submitlist.add(value)
		else:
			print ""
	f.close()
	print submitlist
except:
	print ""

try:
	f = open(inputfile, 'r')
	print ("FILE READ");
	phpcontent=f.read()
#	print "file read done"
	index = 0
	while index != -1:
		index = phpcontent.find("_GET[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		#print part1
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetget.add(phpvalue)
		#print phplist
		index=index2
	print phpsetget

except:
	print "php_error"
try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_POST[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		#print part1
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetpost.add(phpvalue)
		#print phplist
		index=index2
	print phpsetpost
	

except:
	print "php_error"


try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_SERVER[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		#print part1
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetserver.add(phpvalue)
		#print phplist
		index=index2
	print phpsetserver
	

except:
	print "php_serverlist_error"


try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_COOKIE[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetcookie.add(phpvalue)
		index=index2
	print phpsetcookie
	
except:
	print "php_cookie_error"


try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_ENV[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetenv.add(phpvalue)
		index=index2
	print phpsetenv
	
except:
	print "php_cookie_error"



try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_FILES[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetfiles.add(phpvalue)
		index=index2
	print phpsetfiles
	

except:
	print "php_files_error"


try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index = 0
	while index != -1:
		index = phpcontent.find("_REQUEST[",index)
		index2 = phpcontent.find("]",index)
		part1 = phpcontent[index:index2].partition("[")[2]
		quoted=part1.strip()
		phpvalue=quoted[1:len(quoted)-1]
		if phpvalue.strip() is not "":
			phpsetrequest.add(phpvalue)
		index=index2
	print phpsetrequest
except:
	print "php_error"
"""for i in phplist:

	if i in inputlist:

		finallist.append(i)

print finallist

"""
if(len(phpsetget)==0 and len(phpsetpost)==0 and len(phpsetrequest)==0) and len(phpsetfiles)==0 and len(phpsetserver)==0 and len(phpsetcookie)==0 and len(phpsetenv):
	php_calls=""
else:
	php_calls="require_once('clean.php');\n"

for j in phpsetget:
	php_calls=php_calls+"$string = clean($_GET['"+j+"']);\n"+"$_GET['"+j+"']=$string;\n"

for j in phpsetpost:
	php_calls=php_calls+"$string = clean($_POST['"+j+"']);\n"+"$_POST['"+j+"']=$string;\n"

for j in phpsetrequest:
	php_calls=php_calls+"$string = clean($_REQUEST['"+j+"']);\n"+"$_REQUEST['"+j+"']=$string;\n"


for j in phpsetserver:
	php_calls=php_calls+"$string = clean($_SERVER['"+j+"']);\n"+"$_SERVER['"+j+"']=$string;\n"


for j in phpsetcookie:
	php_calls=php_calls+"$string = clean($_COOKIE['"+j+"']);\n"+"$_COOKIE['"+j+"']=$string;\n"


for k in phpsetfiles:
	php_calls=php_calls+"$finfo = new finfo(FILEINFO_MIME_TYPE);\n$fileContents = file_get_contents($_FILES['"+k+"']['tmp_name']);\n$mimeType = $finfo->buffer($fileContents);\nif($mimeType!=$_FILES['"+k+"']['type'])\n\tmove_uploaded_file($_FILES['"+k+"']['tmp_name'],'[WARNING]'.$_FILES['"+k+"']['name'] )\n;$_FILES['"+k+"']['type']=$mimeType;"

for i in phpsetenv:
	 php_calls=php_calls+"$string = clean($_ENV['"+j+"']);\n"+"$_ENV['"+j+"']=$string;\n"
#print php_calls


#Creating output file
try:
	f = open(inputfile, 'r')
	phpcontent=f.read()
	index1 = 0
	for m in re.finditer(r'\(isset\(\$_[A-Z]+\[', phpcontent):
		print "inside for"
		index = m.end()+1
		index2 = phpcontent.find("]",index)
		submitname = phpcontent[index:index2-1]
		print submitname
		if(submitname in submitlist):
			print "inside if"
			index3 = phpcontent.find("{",index2)
			part = phpcontent[index1:index3+1]
			index1=index3+1
			out.write(part)
			out.write(php_calls)
	finalpart = phpcontent[index1:len(phpcontent)]
	out.write(finalpart)
except:
	print "output_error"
