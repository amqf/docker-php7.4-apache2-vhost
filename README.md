# Docker + Apache2 + PHP + MySQL + Apache VHost

!! Projeto para estudos !!

Este projeto visa preparar um ambiente para desenvolvimento local:

- Docker
- Apache2 com configuração de VHost
- PHP
- MySQL

Configure no `/etc/hosts` qualquer domínio apontando para 127.0.0.1. Exemplo:

```
127.0.0.1 subdomain-1.localhost
```

## Por que 127.0.0.1?

Porque não temos um servidor DNS, então toda vez que os containers sobem, o IP dele muda, e seria necessário pegar um novo IP com:

```bash
$ docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' webserver
```

## Por que qualquer domínio?

Porque não é necessário neste projeto configurar múltiplos domínios, então em `vhost.conf` basta configurar `<VirtualHost *:80>`, com `*`.

![alt text](image.png)