SELECT j.cod, j.nome, g.genero, p.produtora, j.descricao, j.nota FROM `jogos` j
JOIN generos g ON j.genero_id = g.cod
JOIN produtoras p ON j.produtora_id = p.cod;
