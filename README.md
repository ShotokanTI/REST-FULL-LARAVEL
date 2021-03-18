
## Startando o projeto

Utilize do comando - php composer.phar install para baixar as dependencias do projeto.

## Fazendo as requisições

 -Utilizei o postman para as requisiçoes

## API Usuario

  GET - Retornar todos os usuarios: http://SEUDOMINIO/api/usuarios

  GET - Retornar um usuario especifico: http://SEUDOMINIO/api/usuarios/{idDesejado}

  POST - Adicionar usuario e endereço do usuario ao banco de dados http://SEUDOMINIO/api/usuarios
    Exemplo: <img src="post_usuario.png"></img>

  PUT - Modificar usuario e endereço do usuario ao banco de dados http://SEUDOMINIO/api/usuarios/{idDesejado}

  DELETE - Excluir um usuario especifico http://SEUDOMINIO/api/usuarios/{idDesejado}

  Observação:Se você excluir um usuario,todos os endereços atrelhados a ele também serão excluidos.
## API ENDERECO

  GET - Retorna todas as cidades cadastradas http://SEUDOMINIO/api/cidades/

  GET - Retorna uma cidade especifica http://SEUDOMINIO/api/cidades/{idDesejado}

  GET - Retorna todos os estados cadastrados http://SEUDOMINIO/api/estados/

  GET - Retorna um Estado especifico http://SEUDOMINIO/api/estados/{idDesejado}

  GET - Retorna o total de usuários cadastrados por cidade ou estado as cidades cadastradas 
  http://SEUDOMINIO/api/totalUsersByCityOrState/{param1}/{param2}/

    exemplo: param1 = Estado Ou Cidade 
             param 2 = Rj ou Guadalupe