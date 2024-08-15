

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

![]( https://img.shields.io/badge/Make_with-love-red)
![](https://img.shields.io/badge/by%20-8A2BE2)
![](https://img.shields.io/badge/Warriors-green)
![](https://img.shields.io/badge/at-black)
![](https://img.shields.io/badge/Epitech_Benin-blue)

  
## Project Infos

 ____________________________



# AUTH 2.0

Authentification with facebook , linkedin , google , github

## Run the project locally 


- Install all requierements
<br>
#### Requierements
 - PHP 8.3
 - Laravel 11
 - MySQL

You can install any stack you want
but **LAMP** is the one used in this tutorial

<a href="https://www.digitalocean.com/community/tutorials/how-to-install-lamp-stack-on-ubuntu">Check this link for a full installation.<a>

``` bash
    sudo apt update
    sudo apt install apache2 -y
    sudo apt install mysql-server -y
    sudo apt install php libapache2-mod-php php-mysql -y
```

- Clone the project
 
 ```bash
    git clone https://github.com/KRusselAlex/alex-russel-authLogin.git
 ```
 - Move to project's directory

  ``` bash
      mv ALEX-RUSSEL-AUTHLOGIN/auth-app
  ```

 - Update your informations in file: .env

  ``` bash
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=Auth
      DB_USERNAME=username
      DB_PASSWORD=password
  ```
_If the file **.env** is not existant, check for **.env.example** and rename it **.env**_ 

- Migrate the database

``` bash
    php artisan migrate
```


 - Serve the website locally

  ``` bash
      # Before run the following command, be sure to be in the project diectory named "freeads" and have all requierements satisfied.
      
      php artisan serve
  ```
## To create your own app for login and signup with social media 

[social media with laravel click](https://laravel.com/docs/11.x/socialite#main-content)


## Features

- **CRUD on user account**
  - User Registration and Connection
  - View of user informations
  - User account update
  - User account deletion 
   -view all users
## Credits

#### Creation's team

<a href="mailto:alex-russel.kouawou@epitech.eu">Alex-Russel Kouawou</a>


#### Epitech Benin

#### Laravel Documentation
