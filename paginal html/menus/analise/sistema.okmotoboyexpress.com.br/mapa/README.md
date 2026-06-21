# Mapa de condutores

Painel em PHP, HTML, CSS, JavaScript e jQuery para visualizar posições de `mod_localizacao`,
associadas aos registros de `mod_condutor`.

## Configuração

As opções principais ficam no começo de `config.php`:

- chave da Geoapify;
- intervalo AJAX (30 segundos por padrão);
- caminho do ícone SVG;
- conexão MySQL e fuso horário.

Com o projeto dentro do diretório servido pelo Apache, abra `index.php` no navegador.
O usuário MySQL configurado precisa de permissão de leitura nas tabelas
`okmotoboyexpress.mod_condutor` e `okmotoboyexpress.mod_localizacao`.

## Recursos

- mapa Geoapify em tela inteira;
- atualização AJAX com jQuery (`$.ajax`) independente;
- filtro por condutor e período;
- filtro por status online/offline usando `con_app_status`;
- contador e indicadores visuais dos condutores online;
- opção de exibir somente a posição mais recente;
- trajetos com uma cor por condutor;
- marcador com nome, placa e horário do último envio;
- resumo de distância aproximada, pontos e último recebimento.

> A quilometragem é uma estimativa em linha geográfica entre os pontos recebidos,
> não a distância exata percorrida pelas ruas.
