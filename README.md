####Техническое задание "ГринХаус"
- Версия php 8.1;
- ипользовал Server Nginx;
- Mysql 8.0;
- composer 2.4;
- В файл `db.php` внести данные БД;
###Создать таблицы в БД
```
create table department(
id int not null auto_increment,
name float not null,
primary key (id)
);

create table type (
id int not null auto_increment,
name varchar(10) not null default '',
primary key (id)
);


create table sample (
id int not null auto_increment,
name varchar(20) not null,
department float not null,
valve_watering int not null,
volume float default null,
EC float not null,
pH float not null,
times timestamp not null default CURRENT_TIMESTAMP,
primary key (id)
);
```
- Требуется `composer` для установки  конвертер HTML в PDF;
- Установить зависимости DomPDF командой `composer require dompdf/dompdf` в папку с проектом;
