# Base de painel com menu lateral e Smarty

Estrutura inicial para projetos PHP com um menu lateral reutilizável,
responsivo e sem dependências de JavaScript externas.

## Arquivos principais

- `index.php`: configura o Smarty e define os dados e opções do menu.
- `template/layout.tpl`: estrutura HTML e inclusão dos templates.
- `template/menu_lateral.tpl`: marcação do menu e dos submenus.
- `template/menu_icone.tpl`: biblioteca local de ícones SVG.
- `template/componentes.tpl`: catálogo visual com componentes copiáveis.
- `template/conteudo.tpl`: conteúdo central simples mantido como exemplo.
- `assets/css/app.css`: aparência, estados e responsividade.
- `assets/js/common.js`: comportamentos usados em várias páginas.
- `assets/js/core/menu.js`: expansão, recolhimento e acessibilidade do menu.
- `assets/js/pages/componentes.js`: comportamento exclusivo do catálogo.

## Como adicionar uma opção

Adicione um item ao array `$menu_itens`, em `index.php`:

```php
[
    'titulo' => 'Produtos',
    'url' => '/produtos',
    'icone' => 'bag',
    'badge' => '5', // opcional
]
```

Para criar um item com submenu:

```php
[
    'titulo' => 'Cadastros',
    'url' => '#',
    'icone' => 'users',
    'filhos' => [
        ['titulo' => 'Clientes', 'url' => '/clientes'],
        ['titulo' => 'Usuários', 'url' => '/usuarios'],
    ],
]
```

Use `'ativo' => true` no item correspondente à página atual.

## Personalização rápida

As cores e medidas principais ficam nas variáveis do começo de
`assets/css/app.css`. As mais usadas são:

- `--sidebar-open`: largura do menu aberto;
- `--sidebar-closed`: largura do menu recolhido;
- `--sidebar-bg`: fundo do menu;
- `--accent`: cor de destaque;
- `--page-bg`: fundo do conteúdo.

## Comportamento

- No computador, o menu começa recolhido e a seta aumenta ou diminui sua largura.
- Itens com `filhos` abrem submenus.
- No celular, o menu vira um painel sobre o conteúdo.
- `Escape` fecha o menu móvel.
- Os botões usam `aria-label` e `aria-expanded` para acessibilidade.

## Catálogo de componentes

A tela inicial agora funciona como uma biblioteca visual do projeto. Ela contém:

- avisos de sucesso, atenção, erro e informação;
- botões principais, secundários e de exclusão;
- badges de status;
- cards de métricas e entregas;
- campos de formulário e validação;
- tabela responsiva;
- estado vazio;
- popups em JavaScript puro e jQuery;
- blocos de HTML com botão para copiar.

Os estilos desses elementos ficam na seção `CATÁLOGO DE COMPONENTES` de
`assets/css/app.css`.

## Organização dos arquivos JavaScript

Use esta convenção nas próximas páginas:

- `assets/js/common.js`: funções utilizadas pelo sistema inteiro;
- `assets/js/core/`: componentes globais, como menu e autenticação;
- `assets/js/pages/`: um arquivo para o comportamento de cada página;
- bibliotecas externas, como jQuery, são carregadas no `layout.tpl`.

## Módulo de clientes

O primeiro módulo funcional foi criado seguindo as classes existentes:

- `clientes.php`: controlador de listagem, cadastro, edição e ações;
- `classes/modelo/clientes.class.php`: objeto e propriedades do cliente;
- `classes/acesso/acesso_clientes.class.php`: consultas e alterações no banco;
- `template/clientes/lista.tpl`: tabela de clientes;
- `template/clientes/formulario.tpl`: cadastro e edição de PF/PJ;
- `assets/js/pages/clientes.js`: busca, máscaras, formulário e popup;
- `assets/css/app.css`: estilos compartilhados e estilos do módulo.

O formulário não expõe `cli_status`, `cli_admin` ou `emp_id_fk`. Esses valores
são controlados no PHP. Na edição, o ID é apenas informativo e o e-mail pode
ser alterado normalmente.

## Módulo de condutores

- `condutores.php`: controlador do CRUD;
- `classes/modelo/condutores.class.php`: modelo do condutor;
- `classes/acesso/acesso_condutores.class.php`: acesso à `mod_condutor`;
- `template/condutores/`: listagem e formulário Smarty;
- `assets/js/pages/condutores.js`: busca, popup, máscaras e validação.

A situação cadastral e o status do aplicativo são exibidos separadamente.
Ativar/desativar pela tela altera somente `con_cad_status`; `con_app_status`
continua sendo controlado pelo aplicativo do condutor.

## Módulos administrativos

Também estão disponíveis:

- `administradores.php`: CRUD de `mod_administradores`;
- `empresas.php`: CRUD completo de `mod_empresas`, incluindo PF/PJ, endereço
  e validade da licença;
- `empresa_admin.php`: CRUD de `mod_empresa_admin`, com vínculo à empresa.

Os módulos de administradores reutilizam os templates em
`template/usuarios_sistema/` e o script `assets/js/pages/usuarios_sistema.js`.
O item Clientes continua presente no menu, mas está oculto com
`style="display:none"`.

## Dashboard e rastreamento

- `index.php` apresenta indicadores reais de condutores, empresas e GPS;
- `meus_dados.php` administra os dados da tabela `mod_sistema`;
- `logs_rastreamento.php` filtra um único condutor por data e hora;
- `assets/js/pages/logs_rastreamento.js` desenha o trajeto com Leaflet;
- `logs_rastreamento_pdf.php` exporta os registros filtrados usando Dompdf.

O mapa de logs nunca combina mais de um condutor no mesmo trajeto. O relatório
PDF usa exatamente o condutor e o período selecionados na tela.

## Relatório de condutores

`relatorio_condutores.php` apresenta o trajeto sem a tabela de logs e calcula:

- quantidade de pontos GPS;
- distância percorrida;
- velocidade média;
- valor informado por quilômetro;
- valor total do período.

O botão de PDF abre um popup para escolher cabeçalho institucional, resumo,
mapa e detalhamento. O PDF usa os dados de `mod_sistema` e a cópia otimizada
`imagens/logo/logo_pdf.jpg`, criada a partir da logo principal.

## Login, mapa e senhas

- `login.php` contém uma tela responsiva com a identidade visual do painel;
- `rastreamento.php` incorpora o mapa antigo dentro do layout com menu lateral;
- `ajax_altera_senha.php` altera senhas separadamente do cadastro;
- nas edições de condutor, administrador e usuário da empresa, o formulário
  de senha aparece somente após clicar em “Alterar senha”;
- a listagem de condutores apresenta telefone formatado e atalho do WhatsApp.

## Executar

Com o Apache do XAMPP ativo, acesse:

`http://localhost/diversos_php/paginal%20html/menus/`
