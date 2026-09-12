CREATE DATABASE biblioteca_online
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;


USE biblioteca_online;
CREATE TABLE usuarios (
   id_usuario INT AUTO_INCREMENT PRIMARY KEY,
   nome       VARCHAR(150) NOT NULL,
   email      VARCHAR(150) NOT NULL,
   senha      VARCHAR(255) NOT NULL
) 


CREATE TABLE livros (
   isbn    VARCHAR(20) PRIMARY KEY,
   titulo  VARCHAR(150) NOT NULL,
   autor   VARCHAR(150) NOT NULL,
   genero  VARCHAR(50)  NOT NULL,
   ano     SMALLINT     NOT NULL
) 
CREATE TABLE estoque (
   isbn    VARCHAR(20) PRIMARY KEY,
   quantidade INT NOT NULL,
   status     VARCHAR(20) NOT NULL,
   CONSTRAINT fk_estoque_livro
   FOREIGN KEY (isbn_fk) REFERENCES livro (isbn)
)



CREATE TABLE emprestimos (


   id_emprestimo    INT AUTO_INCREMENT PRIMARY KEY,
   id_usuario_fk    INT NOT NULL,
   isbn_fk          VARCHAR(20) NOT NULL,
   data_emprestimo  DATE NOT NULL,
   data_devolucao   DATE NOT NULL

)
 
INSERT INTO biblioteca_online.usuarios (id_usuario, nome, email, senha) VALUES
   ('Administrador', 'admin@bibliotech.com', '123456'),
   ('Ana Silva',      'ana@email.com',       '123456'),
   ('João Santos',    'joao@email.com',      '123456');




INSERT INTO biblioteca_online.livros (isbn, titulo, autor, genero, ano) VALUES


   ('970', 'O Hobbit',                    'J. R. R. Tolkien',            'Fantasia',          1937),
   ('973', 'Harry Potter e a Pedra Filosofal', 'J. K. Rowling',           'Fantasia',          1997),
   ('974', 'Capitães da Areia',           'Jorge Amado',                  'Romance',           1937),
   ('975', 'O Pequeno Príncipe',          'Antoine de Saint-Exupéry',    'Fantasia',          1943),
   ('978', 'Dom Casmurro',                'Machado de Assis',             'Romance',           1899),
   ('979', '1984',                        'George Orwell',                'Ficção Científica', 1949);


INSERT INTO biblioteca_online.estoque (isbn_fk, quantidade, status) VALUES


   ('978', 5, 'Disponível'),
   ('975', 3, 'Disponível'),
   ('973', 4, 'Disponível'),
   ('979', 2, 'Disponível'),
   ('970', 3, 'Disponível'),
   ('974', 2, 'Disponível'),
   ('988', 4, 'Disponível'),
   ('915', 5, 'Disponível'),
   ('966', 3, 'Disponível'),
   ('927', 2, 'Disponível');


INSERT INTO biblioteca_online.emprestimos (id_emprestimo, id_usuario_fk, isbn_fk, data_emprestimo, data_devolucao) VALUES
   (3, 2, 3, '2026-08-29', '2026-09-05'),
   (1, 2, 1, '2026-09-01', '2026-09-01'),
   (4, 3, 4, '2026-08-22', '2026-08-30'),
   (2, 4, 2, '2026-08-20', '2026-08-28');


   CONSTRAINT fk_emprestimo_usuario
    FOREIGN KEY (id_usuario_fk) REFERENCES usuario (id_usuario)


   CONSTRAINT fk_emprestimo_livro
    FOREIGN KEY (isbn_fk) REFERENCES livro (isbn)


 



