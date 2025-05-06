create database GaMa_pecas;
use GaMa_pecas;

create table tbUsuario(
codUsuario int primary key auto_increment,
nomeUsuario varchar(50),
emailUsuario varchar(50),
cpfUsuario char(11),
nivelAcesso int
);

create table tbChamado(
codChamado int primary key auto_increment,
titleChamado varchar(50),
descrChamado varchar(200),
statusChamado int,
codUsuarioChamado int,
emailUsuarioChamado varchar(50),
dataCriacaoChamado datetime,
dataUltimaRespostaChamado datetime,
foreign key (codUsuarioChamado)
references tbUsuario(codUsuario)
);
-- statusChamado 1 para pendente, 2 para respondido, 3 para finalizado

create table tbResposta(
dataCriacaoRespChamado datetime,
descrRespChamado varchar(255),
codChamadoRespondido int,
codRespondeu int,
foreign key (codChamadoRespondido)
references tbChamado(codChamado),
foreign key (codRespondeu)
references tbUsuario(codUsuario)
);

insert into tbUsuario(nomeUsuario, cpfUsuario, emailUsuario, nivelAcesso)
values 
("dummy1", "1231231231","emaildummy1@gmail.com", 1),
("dummy2", "1231231231","emaildummy2@gmail.com", 1),
("dummyTec1", "1231231231","emaildummy3@gmail.com", 2);

insert into tbChamado(titleChamado, descrChamado, statusChamado, codUsuarioChamado, dataCriacaoChamado)
values
("chamado teste 1", "ipsum algo one", 2, 2,CURRENT_TIMESTAMP),
("chamado teste 2", "ipsum algo two", 2, 1,CURRENT_TIMESTAMP),
("chamado teste 3", "ipsum algo three", 1, 1,CURRENT_TIMESTAMP),
("chamado teste 4", "ipsum algo four", 1, 1,CURRENT_TIMESTAMP);

# UPDATE tbChamado SET dataUltimaRespostaChamado = CURRENT_TIMESTAMP, statusChamado = 2 WHERE codChamado = codChamadoRespondido;

insert into tbResposta(dataCriacaoRespChamado, descrRespChamado, codChamadoRespondido, codRespondeu)
values
(CURRENT_TIMESTAMP, "ipsum alguma coisa teste 1", 1, 1),
(CURRENT_TIMESTAMP, "ipsum alguma coisa teste 2", 1, 1),
(CURRENT_TIMESTAMP, "ipsum alguma coisa teste 3", 2, 2),
(CURRENT_TIMESTAMP, "ipsum alguma coisa teste 4", 1, 2);


select * from tbUsuario;
select * from tbChamado;

-- delete from tbResposta where codChamadoRespondido > 0

