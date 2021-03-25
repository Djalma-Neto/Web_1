create schema if not exists esquadritec;

set schema 'esquadritec';

create table if not exists endereco(
    id serial primary key not null,
    cidade varchar(30) not null,
    rua varchar(30) not null,
    bairro varchar(30) not null,
    numero varchar(30) not null,
    observacao varchar(30) not null    
);

create table if not exists cliente(
    id serial primary key not null,
    nome varchar(30) not null,
    cpf varchar(30) not null,
    cnpj varchar(30) not null,
    email varchar(30) not null,
    endereco int,
    foreign key (endereco) references endereco(id) on delete cascade
);

create table if not exists telefone(
    id serial primary key not null,
    telefone varchar(30) not null,
    cliente int not null,
    foreign key (cliente) references cliente(id) on delete cascade
);

create table if not exists orcamento(
    id serial primary key not null,
    observacao varchar(100),
    desconto int,
    status varchar(30),
    valor_t_b float,
    valor_f float,
    data date not null,
    cliente int not null,
    foreign key (cliente) references cliente(id) on delete cascade
);

create table if not exists usuario(
    id serial primary key not null,
    nome varchar(30) not null,
    senha varchar(200) not null,
    email varchar(30) not null,
    data varchar(30) not null,
    admin boolean not null 
);

create table if not exists atendimento(
    id serial primary key not null,
    usuario int not null,
    cliente int not null,
    orcamento int not null,
    foreign key (cliente) references cliente(id) on delete cascade,
    foreign key (orcamento) references orcamento(id) on delete cascade,
    foreign key (usuario) references usuario(id) on delete cascade
);

create table if not exists linha(
    id serial primary key not null,
    linha varchar(30) not null
);

create table if not exists modelo(
    id serial primary key not null,
    modelo varchar(30) not null

);

create table if not exists produto(
    id serial primary key not null,
    nome varchar(30) not null,
    valor float,
    orcamento int not null,
    modelo int not null,
    linha int not null,
    foreign key (orcamento) references orcamento(id) on delete cascade,
    foreign key (modelo) references modelo(id) on delete cascade,
    foreign key (linha) references linha(id) on delete cascade
);

create table if not exists materiais(
    id serial primary key not null,
    nome varchar(30) not null,
    valor float not null
);

create table if not exists unidade_medida(
    id serial primary key not null,
    nome varchar(20)
);

create table if not exists material_produto(
    id serial primary key not null,
    valor float,
    quantidade float not null,
    unidade_medida int not null,
    produto int not null,
    materiais int not null,
    foreign key (materiais) references materiais(id) on delete cascade,
    foreign key (produto) references produto(id) on delete cascade,
    foreign key (unidade_medida) references unidade_medida(id) on delete cascade
);

insert into usuario(nome, email, senha, data, admin) values('admin',  'admin', 'MjAyMS0wMy0xNjE3OjAwYWRtaW4=', '2021-03-05 11:07', true);


create or replace function esquadritec.valor_update()
returns trigger as $body$
declare valor_p numeric(11,2);
    begin
        select m.valor into valor_p from esquadritec.materiais m where m.id = new.materiais;
        update esquadritec.produto p set valor = valor + (valor_p * new.quantidade) where p.id = new.produto;
        return new;
    end;
    $body$
    language plpgsql
;

create or replace function esquadritec.orcamento_update()
returns trigger
as $body$
declare valor numeric(11,2);
    begin
        select sum(p.valor) into valor from esquadritec.produto p where p.orcamento = new.orcamento;
        update esquadritec.orcamento o set valor_t_b = valor where o.id = new.orcamento;
        update esquadritec.orcamento o set valor_f = (valor - (valor * (o.desconto / 100))) where o.id = new.orcamento;
        return new;
    end;
    $body$
    language plpgsql
;

create trigger valor before insert on material_produto
    for each row execute procedure valor_update();

create trigger valor_orcamento before update on produto
    for each row execute procedure orcamento_update();
