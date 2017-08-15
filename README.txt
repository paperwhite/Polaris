AUTHORS: 
PRAJAKTA SHINDE
SHIBANI SINGH

There are 4 steps involved in the execution of Polaris.

1. For the installation of the required packages, run the following commands in the unzipped "Polaris" folder:

	python setup.py build

	python setup.py install

2. Open clean.php and change the path of the HTMLPurifier, according to the path in your system.

3. To create the executable "polaris", run the command : 
	
	make

Note: You need to run the first three steps for the first time only.

4. Now, to execute polaris, run the command in the following format:

	./polaris [path to input file] [path to output file]


