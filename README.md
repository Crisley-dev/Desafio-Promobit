# Desafio-Promobit

## Autenticação de Usuario
Devido a inclusão da autenticação de usuarios se torna necessario a criação da tabela 'users' no banco disponibilizado. Segue o dump,

```SQL
CREATE TABLE IF NOT EXISTS `users` (
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) 
```

## Consulta SQL
```SQL
SELECT
tag.name,
COUNT(product_tag.product_id) AS 'Quantidade de Produtos'
FROM tag
INNER JOIN product_tag
ON tag.id = product_tag.tag_id
GROUP BY tag.name
```
