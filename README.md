# Desafio-Promobit

Consulta SQL

SELECT tag.name, COUNT(product_tag.product_id) AS 'Quantidade de Produtos' FROM tag INNER JOIN product_tag ON tag.id = product_tag.tag_id GROUP BY tag.name
