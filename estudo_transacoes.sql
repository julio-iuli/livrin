-- select ds_titulo as titulo, id_livro as id, ds_nome_autor as autor, ds_nome_dono as dono
--  from tb_livro, tb_autor, tb_dono where tb_livro.tb_autor_id_autor = tb_autor.id_autor 
--  and tb_livro.tb_dono_id_dono = tb_dono.id_dono ;

-- select ds_nome_autor, id_autor from tb_autor order by ds_nome_autor;

-- insert into tb_livro (ds_titulo, tb_autor_id_autor, tb_dono_id_dono) values ();

-- insert into tb_autor (ds_nome_autor) value(x);
-- insert into tb_livro (ds_titulo, tb_autor_id_autor, tb_dono_id_dono) values ("x", last_insert_id(), "");

