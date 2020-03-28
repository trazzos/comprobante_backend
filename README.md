# Homestead

### Install virtualbox
### Install vagrant

Recommended using gitbash for all this.

in gitbash run
### vagrant box add laravel/homestead

create a folder in c:/ called homestead and run

### git clone https://github.com/laravel/homestead.git c:/homestead

Do a checkout of a different branch other than master
### cd c:/homestead
### git checkout release

Run 
### bash init.sh

Open the new homestead.yaml
Make sure the provider is virtualbox

Folders should look like this

folders:
    - map: c:/laravel/comprobantedigital
      to: /home/vagrant/comprobantedigital

Sites should look like this

sites:
    - map: comprobantedigital.test
      to: /home/vagrant/comprobantedigital/public

databases:
    - homestead
    - comprobantedigital

Open your hosts file as admin. Host file is located at
### C:\Windows\System32\drivers\etc\hosts

Add
### 192.168.10.10  comprobantedigital.test

Go to c:/homestead and run (RUN THIS AS AN ADMINISTRATOR!!)
### cd c:/homestead
### vagrant up

If you have issues running homestead try running
### bcdedit /set hypervisorlaunchtype off
and restarting your machine

ssh into the virtual machine
### cd c:/homestead
### vagrant ssh

After ssh'ing you will find the project at
### cd /home/vagrant/comprobantedigital

Clone https://github.com/mwleinad/cddocker
To a folder named comprobantedigital in c:/laravel/comprobantedigital

### git clone https://github.com/mwleinad/cddocker.git c:/laravel/comprobantedigital

In a browser open http://comprobantedigital.test/api/customer

# Database

I use Heidi as my database manager

Create a new database comprobantedigital using the following 
host: 127.0.0.1 
port 33060 
user: homestead
pw: secret

In Heidi run 
### CREATE DATABASE comprobantedigital;

# Project

NOTE: All the php artisan commmads must be run from inside homestead (vagrant ssh)
Copy .env.example file and create your new .env file

Run (From ssh)
### cd yourproject
### composer install
### yarn install --no-bin-links
### php artisan key:generate
### php artisan migrate

# Front end
HMR (Hot module replacement) 
### That stupid thing just doesn't work and was taking too long to figure it out

To build your assets just run (ssh)
### yarn watch-poll
That at least build fast and you can refresh your page to see the changes. Is not HMR but it works fast

# Useful links 
https://www.freecodecamp.org/news/how-to-build-a-single-page-application-using-vue-js-vuex-vuetify-and-firebase-838b40721a07/



#Errors
 - yarn watch-poll fails
do 
 - yarn global add cross-env







