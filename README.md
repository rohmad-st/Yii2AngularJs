Simple CRUD Yii 2 Basic Application Template and AngularJs
==========================================================

Aplikasi CRUD sederhana yang dibangun dengan PHP Framework Yii2 dan Javascript Framework AngularJs

Aplikasi ini menggunakan prinsip IoC(Inversion Of Control) atau Dependency Injection, Repository
Pattern dan SOLID pattern (masih diteliti kebenarannya :D).

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      components/         contains database repositories(IoC/dependency injection)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


APA YANG BERUBAH
----------------

Saya menambahkan folder ```components``` untuk mengatur struktur aplikasi ini. Jadi struktur aplikasi seperti ini :

    components/
        AbstracForm.php
        AbstractRepository.php
        StudentCreateForm.php
        StudentInterface.php
        StudentRepository.php

Jangan lupa pada file ```web\index.php``` tambahkan code dibawah ini untuk Memanage IoC Container

```php
    \Yii::$container->set('app\components\StudentInterface', 'app\components\StudentRepository');
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

### Nginx Server

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

**NOTE:** Sengaja membuat aplikasi ini tanpa menggunakan CRUD Generator dari Gii agar saya sendiri faham alur kerja dari framework
ini. Maklum saya belum genap 1 minggu belajar Yii2 ini, hanya bermodal Guide dan liat code didalamnya.

### CURHAT
Jujur saya kurang begitu puas dengan hasil dari output query Yii yang sulit saya fahami(karena terbatasnya kemampuan saya - alasan pribadi).
Misal untuk menampilkan data dengan pagination yang dengan mudah diolah di frontend misal jika menggunakan AngualrJs atau framework MVC lainnya.

Oleh sebab itu saya coba membuat outputnya sama dengan ```Eloquent``` punya framework Laravel yang defaultnya adalah ```json```,
untuk membuatnya sih simple tinggal set output yang akan dikeluarkan menjadi ```json``` bisa dilihat pada file ```AbstractRepository.php``` dan ```StudentRepository.php```

Hasilnya akan menjadi seperti dibawah ini :

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




AUTHOR
------


Twitter [@cyberid41](http://twitter.com/cyberid41)

Facebook [cyberid41](http://facebook.com/cyberid41)

Email [edicyber@gmail.com](mailto:edicyebr@gmail.com)
