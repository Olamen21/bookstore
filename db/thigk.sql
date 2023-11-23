create database if not exists thigk
character set 'utf8' collate 'utf8_unicode_ci';

create table books(
   book_id int not null primary key auto_increment,
	 book_title varchar(60) not null,
	 book_author varchar(60) not null,
	 book_image varchar(40) null,
	 book_descr text null,
	 book_price decimal(6,2) not null,
	 publisherid int not null,
	 constraint fk_books foreign key(publisherid) references publisher(publisherid)
)engine = InnoDb;

create table publisher(
publisherid int not null primary key auto_increment,
publisher_name varchar(60)
)engine = InnoDb;

