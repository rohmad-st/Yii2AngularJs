Simple CRUD Yii2 and AngularJs
==========================================================

Simple CRUD application built with PHP Framework Yii2 and Javascript Framework AngularJs.

These applications use the IoC (Inversion Of Control) or Dependency Injection and Repository Pattern.

DIRECTORY STRUCTURE
-------------------

      assets/                       contains assets definition
      commands/                     contains console commands (controllers)
      config/                       contains application configurations
      controllers/                  contains Web controller classes
      mail/                         contains view files for e-mails
      runtime/                      contains files generated during runtime
      SchoolApp/
            Events/                 contains event handler
            Exceptions/             contains exceptions
            Repositories/           contains database repositories
                    ActiveRecord/
            Services/
                    Forms/          contains form services
      tests/                        contains various tests for the basic application
      vendor/                       contains dependent 3rd-party packages
      views/                        contains view files for the Web application
      web/                          contains the entry script and Web resources


Don't forget the file ```web\index.php``` add the code below to Manage the IoC Container

```php
    \Yii::$container->set('app\SchoolApp\Repositories\StudentInterface', 'app\SchoolApp\Repositories\ActiveRecord\StudentRepository');
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=app_school',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
### Create Database name app_school then create the table students
```
-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nomer_telepon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
```

### Nginx Server Configuration

```
server {
    listen 127.0.0.1:80;

    server_name yii-angularjs.dev www.yii-angularjs.dev;
    root your/path/basic/app/template/web;
    index index.php index.html;

    charset utf-8;
    client_max_body_size 128M;

    location / {
        try_files $uri $uri/ /index.php?$args;

    }

    location ~ \.php$ {
    	fastcgi_pass 127.0.0.1:9054;
	    fastcgi_index index.php;
	    fastcgi_param SCRIPT_FILENAME $document_root/$fastcgi_script_name;
	    include fastcgi_params;
    }

    location ~* \.(js|css|less|png|jpg|jpeg|gif|ico|woff|ttf|svg|tpl)$ {
        expires 24h;
        access_log off;
    }

    location = /favicon.ico {
        log_not_found off;
        access_log off;
    }

    location = /robots.txt {
        log_not_found off;
        access_log off;
    }

    location ~ /\. {
        deny all;
        access_log off;
        log_not_found off;
    }
}
```
The output that I spend on this application in ```json``` format, in order to make easier the frontend developer, the output same the Eloquent from Laravel PHP Framework.

```
{
    "total": "2",
    "per_page": 10,
    "current_page": 1,
    "last_page": 1,
    "from": 1,
    "to": 2,
    "data": [
            {
                "id": 1,
                "nama": "Edi Santoso",
                "kelas": "1A",
                "umur": 19
            },
            {
                "id": 2,
                "nama": "Fahmi Al Fahreza",
                "kelas": "2A",
                "umur": 18
            }
    ]
}
```

TESTING BAKCEND
===============
You can test the CRUD using rest client services, such as the Postman extention for Chrome.

FRONTEND COMING SOON
====================


AUTHOR
------


Twitter [@cyberid41](http://twitter.com/cyberid41)

Facebook [cyberid41](http://facebook.com/cyberid41)

Email [edicyber@gmail.com](mailto:edicyebr@gmail.com)
