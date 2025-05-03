create database GaMa_pecas;
use GaMa_pecas;

create table tbCliente(
codCliente int primary key auto_increment,
nomeCliente varchar(50),
emailCliente varchar(50),
cpfCliente char(11)
);

create table tbTecnico(
codTecnico int primary key auto_increment,
nomeTecnico varchar(50),
cpfTecnico int
);

create table tbChamado(
codChamado int primary key auto_increment,
titleChamado varchar(50),
descrChamado varchar(200),
statusChamado int,
codClienteChamado int,
emailClienteChamado varchar(50),
dataCriacaoChamado datetime,
dataUltimaRespostaChamado datetime,
foreign key (codClienteChamado)
references tbCliente(codCLiente)
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
references tbTecnico(codTecnico)
);

insert into tbCliente(nomeCliente, cpfCliente)
values ("dummy2", "1231231231");

select * from tbCliente;
select * from tbChamado;
