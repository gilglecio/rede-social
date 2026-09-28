Rede Social
===========

Série didática ensinando a criar uma rede social com PHP.

Olá pessoal sou Gilglécio Santos, este é o segunda vídeo da série "Criando uma rede social" com php.

Nesta aula vou está estruturando o layout da pagina de cadastro para celulares smartphones, Na próxima aula vou esclarecer algumas coisas sobre liquidificação de websites, e apresentando técnicas sobre o assunto. Espero que gostem. Abraços...

## Rodando

Requisitos: Docker com Docker Compose.

```bash
docker compose up -d --build
```

- Aplicação: http://localhost:4002 (crie uma conta em "Crie uma agora")
- MySQL: `localhost:3307`, banco `redesocial`, usuário `redesocial` / senha `123` (root: `123`)

O banco é criado automaticamente a partir de `aularedesocial.sql` na primeira subida.
Para recriar o banco do zero: `docker compose down -v && docker compose up -d`.

Se o seu usuário no host não tiver uid 1000, rode `docker compose build --build-arg UID=$(id -u)` para que o Apache consiga gravar em `uploads/`.
