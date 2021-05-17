# Swiftmailer

documentation https://swiftmailer.symfony.com/docs/introduction.html

## step of installation

```bash
# 1 composer
composer install

# 2 Got to the directory
cd src

# 3 PHP server interne
php -S localhost:8080

# if you prefer PHP server with the full options
php -S localhost:8080 -ddisplay_errors=1 -dzend_extension=xdebug.so -dxdebug.remote_enable=1 -dxdebug.remote_autostart=1 -dxdebug.remote_port=3004

```

<hr>

## You don't have PHP ? And you are on Windows ?


### 1 Install Git
https://git-scm.com/

### 2 VSCODE 
 - Let's go to VSCODE
 - Open the terminal 
 - Select Default Profile
 - Choose git bash from the window that is open at the top
 - in terminal select bash
 
### 3 PHP Installation
https://windows.php.net/download/
- choose your version and choose One thread or multi thread
- Ex : PHP 7.4 Non Thread
- EX : PHP 8 (Thread Safe is recommended if you use apache2)
- Extract folder in programmes

### 4 On Windows
 - Search : Edit the system environment variable
 - Click on the windows bottom: Environment Variables
 - Find Path and double-click
 - past the path of PHP in programmes

## Check PHP version
```bash
php --version
```




