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

insert into usuario(nome, email, senha, data, admin) values('admin',  'admin', 'MjAyMS0wMy0xNDE3OjM3YWRtaW4=', '2021-03-05 11:07', true);


create or replace function valor_update()
 returns trigger
 language plpgsql
as $function$
declare valor float;
    begin
            select m.valor into valor from materiais m where m.id = new.materiais;
            update produto set valor = produto.valor + (valor * new.quantidade) where produto.id = new.produto;
            return new;
    end;
    $function$
;
create trigger valor after insert or update on material_produto
    for each row execute procedure valor_update();


create or replace function orcamento_update()
 returns trigger
 language plpgsql
as $function$
declare valor integer;
    begin
			select sum(produto.valor) into valor from produto where produto.orcamento = new.orcamento;
			update orcamento set valor_t_b = valor where orcamento.id = new.orcamento;
			update orcamento set valor_f = (valor - (valor * (orcamento.desconto / 100))) where orcamento.id = new.orcamento;
            return new;
    end;
    $function$
;
create trigger valor_orcamento after insert or update on produto
    for each row execute procedure orcamento_update();
