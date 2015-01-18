drop database gobscore;

create database gobscore;

use gobscore;

drop table institucions;
create table institucions(
   id int(11) not null primary key auto_increment,
	name varchar(500) not null unique,
	deleted boolean not null,
	created datetime not null,
	updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table users;
create table users(
   id int(11) not null primary key auto_increment,
	name varchar(500) not null,
	username varchar(500) not null unique,
	password varchar(500) not null,
	role varchar(500) not null,
	deleted boolean not null,
	institucion_id int(11) not null,
	created datetime not null,
	updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table forms;
create table forms(
   id int(11) not null primary key auto_increment,
	name varchar(500) not null unique,
	implementation date not null,
	status boolean not null,
	institucion_id int(11) not null,
	deleted boolean not null,
	created datetime not null,
	updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table questions;
create table questions(
   id int(11) not null primary key auto_increment,
	name varchar(500) not null,
	form_id int(11) not null,
	deleted boolean not null,
	created datetime not null,
	updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table answers;
create table answers(
   id int(11) not null primary key auto_increment,
	answer boolean not null,
	question_id int(11) not null,
	user_id int(11) not null,
	created datetime not null,
	updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);


insert into forms (name, status, institucion_id) values ('Formulario 1',1,1);
insert into forms (name, status, institucion_id) values ('Formulario 2',1,2);

insert into questions (name, form_id) values ('¿Cómo evalúa la gestión de la institución?',1);
insert into questions (name, form_id) values ('¿Informe de rendición de cuentas fue entregado antes de la audiencia pública?',1);
insert into questions (name, form_id) values ('¿El titular informó sobre los obstáculos enfrentados?',1);
insert into questions (name, form_id) values ('¿Dieron explicaciones sobre las decisiones tomadas en la gestión?',1);
insert into questions (name, form_id) values ('¿Se informó sobre la ejecución presupuestaria?',1);
insert into questions (name, form_id) values ('¿Hubo espacio para la participación ciudadana?',1);
insert into questions (name, form_id) values ('¿El funcionario dio respuesta a las preguntas efectuadas?',1);

insert into questions (name, form_id) values ('¿Cómo evalúa la gestión de la institución?',2);
insert into questions (name, form_id) values ('¿Informe de rendición de cuentas fue entregado antes de la audiencia pública?',2);
insert into questions (name, form_id) values ('¿El titular informó sobre los obstáculos enfrentados?',2);
insert into questions (name, form_id) values ('¿Dieron explicaciones sobre las decisiones tomadas en la gestión?',2);
insert into questions (name, form_id) values ('¿Se informó sobre la ejecución presupuestaria?',2);
insert into questions (name, form_id) values ('¿Hubo espacio para la participación ciudadana?',2);
insert into questions (name, form_id) values ('¿El funcionario dio respuesta a las preguntas efectuadas?',2);




drop table denuncias;
create table denuncias(
   id int(11) not null primary key auto_increment,
   nombre varchar(255) not null,
   email varchar(255) not null,
   tipo_id varchar(2) not null,
	mostrar boolean not null,
   codigo varchar(16) not null,
   institucion_id int(11) not null,
   estado int(2) not null,
   created datetime not null,
   updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table mensajes;
create table mensajes(
   id int(11) not null primary key auto_increment,
   contenido varchar(5000) not null,
   tipo varchar(2) not null,
   denuncia_id int(11) not null,	
   created datetime not null,
   updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table calificacions;
create table calificacions(
   id int(11) not null primary key auto_increment,
   visto double not null,
   respuesta double not null,
   calificacion int(2) not null,
   denuncia_id int(11) not null,	
   created datetime not null,
   updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);

drop table tiempos;
create table tiempos(
   id int(11) not null primary key auto_increment,
   total double not null,
   institucion_id int(11) not null,	
   created datetime not null,
   updated TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP
);


insert into users values(1,'Administrador','xscharliexs@gmail.com','42aa600817f47639d605f74dbe228af30dadc47a','root',0,0,'2015-01-10 15:16:38','2015-01-10 15:16:38');



/*select count(calificacions.id) from calificacions, denuncias where denuncias.id=calificacions.denuncia_id and denuncias.institucion_id=1 and calificacions.respuesta!=-1;*/


select questions.id, count(answer) from answers, questions, forms  where forms.id=questions.form_id and questions.id=answers.question_id and forms.id=1 and answer=1 group by question_id;

select question_id, count(answer) from answers  where answer=0 group by question_id;



select questions.id, count(answer) from answers, questions, forms  where forms.id=questions.form_id and questions.id=answers.question_id and forms.id=1 and answer=0 group by question_id;




