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

insert into tbUsuario(nomeUsuario, cpfUsuario, nivelAcesso)
values ("dummy1", "1231231231", 1);

insert into tbUsuario(nomeUsuario, cpfUsuario, nivelAcesso)
values ("dummy2", "1231231231", 1);

insert into tbUsuario(nomeUsuario, cpfUsuario, nivelAcesso)
values ("dummyTec1", "1231231231", 2);

select * from tbUsuario;
select * from tbChamado;

-- delete from tbUsuario where codUsuario > 0

