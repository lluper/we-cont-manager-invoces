# WeCont | Desafio | Bakcend Developer

REST API para gerenciamento do faturas 

## Requisitos

* PHP ^7.0
* Composer 
* Mysql

## Recomendações
Recomendamos que para executar o projeto em localhost realizar uso de um ambiente de desenvolvimento pronto como por exemplo: 

* [Xamp](https://www.apachefriends.org/index.html) 
* [Laragon](https://laragon.org/)

obs. O uso destes ambientes não é obrigatório, estão sendo indicados apenas para facilitar seu dia a dia.

## Instalação do projeto 

#### 1 - Primeiramente deverá fazer o clone do projeto. 

```git
git clone https://github.com/lluper/we-cont-manager-invoces.git
```

Após realizar o clone do projeto navegue até a pasta do projeto para dar continuidade ao processo.

#### 2 - Instalação das dependências

```composer
composer install
```
#


#### 3 - Copiando arquivo .env.example para .env
Após a instalação das dependências é necessário realizar a copia do arquivo ".env.example" para um ".env", sem esse arquivo não temos como inserir as informações do nosso banco de dados nem outras informações importantes.

A forma com a qual vai ser copiado o arquivo .env.example vai variar de sistema operacional abaixo litamos instruções para windows e linux.

Windows
```dash
copy .env.example .env
```

Linux
```dash
cp .env.example .env
```
#

#### 4 - Criando uma APP KEY

```dash
php artisan key:generate
```

Caso esta chave não seja criada o Laravel vai gerar um erro logo que a aplicação for iniciada.
Se tiver qualquer duvida sobre o por que desta chave acesse a  [documentação oficial do Laravel](https://laravel.com/docs/8.x/installation#configuration)

#### 5 - Criando uma JWT SECRET
É a chave que será usada para assinar seus tokens.

```
php artisan jwt:secret
```
Em caso de duvida acesse a [documentação do jwt-auth](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/)

#

#### 6 -  Adicionando as  informações para conexão com o banco de dados
**Lembrando que para seguir esse passo já deve existir um banco de dados onde iremos conectar.**

Dentro do nosso arquivo .env que foi criado no passo 5, temos alguns variáveis de ambiente onde tu deves inserir os dados do seu banco.

O Laravel nos ajuda muito facilitando todo o processo de conexão com nosso banco , dentro do seu arquivo .env apenas insira os dados de acordo com seu ambiente desenvolvimento.

```.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

#### 7 - Realizando nossas migrações
Nossa aplicação disponibiliza alguns seeds com algumas faturas e dois usuários.

Caso queira migrar apenas as tabelas para seu banco  execute o comando abaixo

```
php artisan migrate
```

Se preferir migrar com alguns dados de exemplo execute:
```
php artisan migrate --seed
```

listar usuarios


#### 8 - Executar nosso projeto 

Rode o comando:
```
php artisan serve
```

Agora nossa aplicação esta sendo executada.


---
## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
