# Parlador Ideal
O Parlador Ideal é uma ferramenta de microblogging, onde os colaboradores da empresa Atlas Shrugged poderão compartilhar suas atualizações pessoais e de projetos, ideias e curiosidades sobre liberalismo econômico, com posts de até 280 caracteres.

Para desenvolver esse projeto eu usei de inspiração o Twitter(ou X) que é uma plataforma de microblogging bem parecida com a ideia da empresa.

# Detalhes Técnicos
* Foi usado o framework Laravel para o Back-end e Vue.js para o Front-end do sistema.
* Toda a parte de Autenticação de Usuário foi feita com a ferramenta Breeze do Laravel

# Para rodar o projeto
O projeto foi desenvolvido utilizando o Sail, se estiver no Windows será necessário ter o WSL2 e o Docker instalado para rodar.

* Clone o código-fonte em uma pasta no diretório (~) do seu Linux
* Entre na pasta do projeto pelo terminal e instale as dependências com: `composer install`
*  Instale o **Sail**: `composer require laravel/sail`
* Pode ser necessário criar um novo arquivo **.env**, para isso, crie o arquivo e copie o conteudo de .env.example para dentro dele
* Inicie o Sail com o comando: `./vendor/bin/sail`
* Instale o **package.json**: `sail npm install`
* Após isso inicie o Vite: `sail npm run dev` e tente abrir o site no seu navegador pelo **localhost**
* Para criar as tabelas e popular o banco: `sail artisan migrate && sail artisan db:seed`

  Usuário de teste:
    email: `test@example.com`
    senha: `password`

# Bibliotecas Externas

A única biblioteca externa utilizada foi o **day.js** para exibir o tempo que a publicação foi criada.
