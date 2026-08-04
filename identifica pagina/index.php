<?php
/**
 * Landing pages multi-domínio em um único arquivo.
 * Cada domínio carrega uma empresa, identidade visual e conteúdo diferente.
 */

declare(strict_types=1);

$host = strtolower(trim($_SERVER['HTTP_HOST'] ?? 'localhost'));
$host = preg_replace('/:\d+$/', '', $host) ?: 'localhost';
$host = rtrim($host, '.');

$sites = [
    'tempuri.org' => [
        'empresa' => 'Flash Moto Entregas',
        'sigla' => 'FM',
        'slogan' => 'Sua entrega urgente, rápida e segura.',
        'descricao' => 'Coletas e entregas expressas para empresas, com acompanhamento em tempo real e atendimento ágil.',
        'cidade' => 'Curitiba e região',
        'cor_primaria' => '#ff5a00',
        'cor_secundaria' => '#111827',
        'cor_destaque' => '#ffd166',
        'fundo' => '#fff8f1',
        'estilo' => 'diagonal',
        'servicos' => ['Entrega expressa', 'Coleta empresarial', 'Documentos urgentes'],
        'cta' => 'Solicitar entrega agora',
        'telefone' => '(41) 99999-1001',
    ],
    'themindelectric.com' => [
        'empresa' => 'Rota Prime Motoboy',
        'sigla' => 'RP',
        'slogan' => 'Logística urbana com padrão profissional.',
        'descricao' => 'Soluções sob medida para escritórios, clínicas, lojas e empresas que precisam de entregas recorrentes.',
        'cidade' => 'São Paulo e Grande São Paulo',
        'cor_primaria' => '#0f4c81',
        'cor_secundaria' => '#081f33',
        'cor_destaque' => '#2ec4b6',
        'fundo' => '#edf7ff',
        'estilo' => 'corporativo',
        'servicos' => ['Contratos mensais', 'Rotas programadas', 'Malotes e documentos'],
        'cta' => 'Pedir proposta comercial',
        'telefone' => '(11) 98888-2002',
    ],
    'license.codegear.com' => [
        'empresa' => 'Ágil Box Entregas',
        'sigla' => 'AB',
        'slogan' => 'Pequenas encomendas. Grandes compromissos.',
        'descricao' => 'Entregas rápidas para e-commerce, lojas locais, autopeças e pequenos negócios.',
        'cidade' => 'Belo Horizonte e região',
        'cor_primaria' => '#7c3aed',
        'cor_secundaria' => '#24123f',
        'cor_destaque' => '#fbbf24',
        'fundo' => '#f7f1ff',
        'estilo' => 'cards',
        'servicos' => ['E-commerce local', 'Peças e produtos', 'Entrega no mesmo dia'],
        'cta' => 'Calcular uma entrega',
        'telefone' => '(31) 97777-3003',
    ],
    'track.embarcadero.com' => [
        'empresa' => 'Track Moto Express',
        'sigla' => 'TM',
        'slogan' => 'Acompanhe. Controle. Entregue.',
        'descricao' => 'Operação de motofrete com rastreamento, comprovante de entrega e gestão de rotas.',
        'cidade' => 'Rio de Janeiro e região',
        'cor_primaria' => '#00a86b',
        'cor_secundaria' => '#052e22',
        'cor_destaque' => '#9cffd7',
        'fundo' => '#effff8',
        'estilo' => 'mapa',
        'servicos' => ['Rastreamento', 'Comprovante digital', 'Otimização de rotas'],
        'cta' => 'Falar com a operação',
        'telefone' => '(21) 96666-4004',
    ],
    'updates.embarcadero.com' => [
        'empresa' => 'Turbo Entrega Já',
        'sigla' => 'TJ',
        'slogan' => 'Velocidade para o seu negócio não parar.',
        'descricao' => 'Atendimento imediato para farmácias, restaurantes, floriculturas e comércio local.',
        'cidade' => 'Porto Alegre e região',
        'cor_primaria' => '#ef233c',
        'cor_secundaria' => '#2b2d42',
        'cor_destaque' => '#ffbe0b',
        'fundo' => '#fff3f5',
        'estilo' => 'energia',
        'servicos' => ['Delivery rápido', 'Coletas urgentes', 'Atendimento comercial'],
        'cta' => 'Chamar um motoboy',
        'telefone' => '(51) 95555-5005',
    ],
    'license.embarcadero.com' => [
        'empresa' => 'Elite Courier Moto',
        'sigla' => 'EC',
        'slogan' => 'Confiança em cada quilômetro.',
        'descricao' => 'Serviço executivo para documentos sigilosos, contratos, peças e materiais de alto valor.',
        'cidade' => 'Brasília e região',
        'cor_primaria' => '#b08900',
        'cor_secundaria' => '#1f2937',
        'cor_destaque' => '#f4e1a1',
        'fundo' => '#fffdf5',
        'estilo' => 'premium',
        'servicos' => ['Documentos sigilosos', 'Serviço executivo', 'Atendimento agendado'],
        'cta' => 'Agendar serviço executivo',
        'telefone' => '(61) 94444-6006',
    ],
    'www.themindelectric.com' => [
        'empresa' => 'Rota Prime Empresas',
        'sigla' => 'RE',
        'slogan' => 'Sua operação de entregas em boas mãos.',
        'descricao' => 'Terceirização de motoboys, rotas fixas e gestão completa para empresas com alta demanda.',
        'cidade' => 'Atendimento corporativo nacional',
        'cor_primaria' => '#2563eb',
        'cor_secundaria' => '#0f172a',
        'cor_destaque' => '#60a5fa',
        'fundo' => '#f4f8ff',
        'estilo' => 'corporativo2',
        'servicos' => ['Motoboy fixo', 'Equipe dedicada', 'Relatórios operacionais'],
        'cta' => 'Montar operação dedicada',
        'telefone' => '(11) 93333-7007',
    ],
    'rgquixsqb.radstudioxe.com' => [
        'empresa' => 'Ninja Moto Log',
        'sigla' => 'NL',
        'slogan' => 'Entregas inteligentes para quem vende todos os dias.',
        'descricao' => 'Integração entre pedidos, entregadores e clientes para uma experiência de entrega mais eficiente.',
        'cidade' => 'Campinas e região',
        'cor_primaria' => '#111827',
        'cor_secundaria' => '#000000',
        'cor_destaque' => '#22d3ee',
        'fundo' => '#eefcff',
        'estilo' => 'darktech',
        'servicos' => ['Pedidos integrados', 'Despacho rápido', 'Gestão de entregadores'],
        'cta' => 'Conhecer a solução',
        'telefone' => '(19) 92222-8008',
    ],
];

$site = $sites[$host] ?? null;

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

if ($site === null):
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtores Web | Acesso</title>
    <style>
        *{box-sizing:border-box} body{margin:0;font-family:Inter,Arial,sans-serif;background:linear-gradient(135deg,#111827,#2b1600);min-height:100vh;display:grid;place-items:center;padding:24px;color:#111827}
        .login{width:min(430px,100%);background:#fff;border-radius:28px;padding:34px;box-shadow:0 24px 70px rgba(0,0,0,.35);border:1px solid rgba(255,122,0,.2)}
        .logo{display:flex;justify-content:center;margin-bottom:22px}.logo img{max-width:240px;width:100%;height:auto}
        h1{font-size:24px;margin:0 0 8px;text-align:center}.sub{color:#6b7280;text-align:center;line-height:1.6;margin-bottom:24px}
        label{font-size:13px;font-weight:700;color:#374151;display:block;margin:14px 0 7px}.input{width:100%;padding:14px 15px;border:1px solid #d1d5db;border-radius:13px;font-size:15px;outline:none}.input:focus{border-color:#ff7200;box-shadow:0 0 0 4px rgba(255,114,0,.12)}
        button{width:100%;border:0;border-radius:13px;padding:15px;margin-top:20px;font-size:15px;font-weight:800;background:#ff7200;color:#fff;cursor:pointer}button:hover{filter:brightness(.95)}
        .host{margin-top:20px;background:#fff7ed;color:#9a3412;padding:12px;border-radius:12px;font-size:12px;text-align:center;word-break:break-all}.foot{font-size:12px;color:#9ca3af;text-align:center;margin-top:18px}
    </style>
</head>
<body>
    <main class="login">
        <div class="logo"><img src="https://produtoresweb.com/assets/logo-produtoresweb.png" alt="Produtores Web"></div>
        <h1>Acesso administrativo</h1>
        <p class="sub">Este endereço não possui uma landing page configurada. Entre com seus dados para acessar o painel.</p>
        <form onsubmit="event.preventDefault(); alert('Tela demonstrativa. Conecte este formulário ao seu sistema de autenticação.');">
            <label for="email">E-mail</label>
            <input class="input" id="email" type="email" placeholder="seuemail@empresa.com" required>
            <label for="senha">Senha</label>
            <input class="input" id="senha" type="password" placeholder="Digite sua senha" required>
            <button type="submit">Entrar no sistema</button>
        </form>
        <div class="host">Host identificado: <?= e($host) ?></div>
        <div class="foot">Produtores Web — soluções digitais para empresas</div>
    </main>
</body>
</html>
<?php
exit;
endif;

$whatsapp = preg_replace('/\D+/', '', $site['telefone']);
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= e($site['descricao']) ?>">
    <title><?= e($site['empresa']) ?> | <?= e($site['slogan']) ?></title>
    <style>
        :root{
            --primary:<?= e($site['cor_primaria']) ?>;
            --secondary:<?= e($site['cor_secundaria']) ?>;
            --accent:<?= e($site['cor_destaque']) ?>;
            --surface:<?= e($site['fundo']) ?>;
        }
        *{box-sizing:border-box;scroll-behavior:smooth}
        body{margin:0;font-family:Inter,Arial,sans-serif;color:#111827;background:var(--surface)}
        a{text-decoration:none;color:inherit}.container{width:min(1180px,calc(100% - 36px));margin:auto}
        header{position:sticky;top:0;z-index:20;background:rgba(255,255,255,.9);backdrop-filter:blur(14px);border-bottom:1px solid rgba(17,24,39,.08)}
        .nav{min-height:76px;display:flex;align-items:center;justify-content:space-between;gap:20px}.brand{display:flex;align-items:center;gap:12px;font-weight:900}.mark{width:46px;height:46px;border-radius:15px;background:var(--primary);color:#fff;display:grid;place-items:center;box-shadow:0 12px 30px color-mix(in srgb,var(--primary) 28%,transparent)}
        .menu{display:flex;gap:22px;font-size:14px;font-weight:700;color:#475569}.menu a:hover{color:var(--primary)}.topbtn{background:var(--primary);color:#fff;padding:12px 18px;border-radius:12px;font-weight:800}
        .hero{position:relative;overflow:hidden;padding:94px 0 72px}.hero:before{content:"";position:absolute;width:520px;height:520px;border-radius:50%;background:color-mix(in srgb,var(--primary) 18%,transparent);right:-190px;top:-190px;filter:blur(2px)}
        .hero-grid{display:grid;grid-template-columns:1.08fr .92fr;gap:52px;align-items:center;position:relative}.eyebrow{display:inline-flex;align-items:center;gap:8px;background:#fff;border:1px solid rgba(17,24,39,.08);padding:9px 13px;border-radius:999px;font-size:13px;font-weight:800;color:var(--primary);box-shadow:0 10px 30px rgba(15,23,42,.06)}
        h1{font-size:clamp(42px,6vw,76px);line-height:.98;letter-spacing:-3px;margin:22px 0 22px;color:var(--secondary)}.hero p{font-size:19px;line-height:1.75;color:#526070;max-width:680px}.actions{display:flex;flex-wrap:wrap;gap:14px;margin-top:30px}.btn{padding:15px 21px;border-radius:14px;font-weight:900;display:inline-flex;align-items:center;justify-content:center;gap:8px}.btn-primary{background:var(--primary);color:#fff;box-shadow:0 14px 35px color-mix(in srgb,var(--primary) 30%,transparent)}.btn-outline{background:#fff;border:1px solid rgba(15,23,42,.1)}
        .visual{min-height:470px;border-radius:34px;padding:26px;background:linear-gradient(145deg,var(--secondary),color-mix(in srgb,var(--secondary) 70%,var(--primary)));color:#fff;box-shadow:0 32px 80px rgba(15,23,42,.22);position:relative;overflow:hidden}.visual:before{content:"";position:absolute;inset:auto -80px -110px auto;width:300px;height:300px;border-radius:50%;background:var(--accent);opacity:.22}.bike{font-size:92px;text-align:center;margin:36px 0 12px}.status{display:grid;grid-template-columns:repeat(2,1fr);gap:13px}.status div{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.13);padding:17px;border-radius:18px}.status b{display:block;font-size:26px;margin-bottom:4px}.status span{font-size:12px;opacity:.75}.route{margin-top:18px;background:rgba(255,255,255,.1);padding:18px;border-radius:18px}.line{height:8px;background:rgba(255,255,255,.17);border-radius:99px;overflow:hidden;margin-top:12px}.line i{display:block;width:74%;height:100%;background:var(--accent);border-radius:99px}
        section{padding:76px 0}.section-title{text-align:center;max-width:700px;margin:0 auto 38px}.section-title h2{font-size:38px;margin:0 0 12px;color:var(--secondary)}.section-title p{color:#64748b;line-height:1.7}.cards{display:grid;grid-template-columns:repeat(3,1fr);gap:20px}.card{background:#fff;border:1px solid rgba(15,23,42,.08);border-radius:22px;padding:27px;box-shadow:0 16px 45px rgba(15,23,42,.06)}.icon{width:52px;height:52px;border-radius:16px;background:color-mix(in srgb,var(--primary) 12%,white);color:var(--primary);display:grid;place-items:center;font-size:24px;margin-bottom:18px}.card h3{margin:0 0 10px;color:var(--secondary)}.card p{margin:0;color:#64748b;line-height:1.65}
        .steps{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}.step{padding:28px;border-left:4px solid var(--primary);background:rgba(255,255,255,.65);border-radius:0 20px 20px 0}.step small{font-weight:900;color:var(--primary)}.step h3{margin:10px 0}.cta{padding:42px;border-radius:30px;background:var(--secondary);color:#fff;display:flex;align-items:center;justify-content:space-between;gap:28px;position:relative;overflow:hidden}.cta:after{content:"";position:absolute;width:230px;height:230px;border-radius:50%;background:var(--primary);right:-80px;top:-90px;opacity:.28}.cta h2{font-size:36px;margin:0 0 8px}.cta p{margin:0;color:#cbd5e1}.cta .btn{position:relative;z-index:2;background:var(--primary);color:#fff;white-space:nowrap}
        footer{padding:34px 0;color:#64748b}.footrow{display:flex;justify-content:space-between;gap:20px;align-items:center}.domain{font-size:12px;background:#fff;padding:8px 12px;border-radius:999px;border:1px solid rgba(15,23,42,.08)}
        body[data-layout="premium"] .visual{border:1px solid color-mix(in srgb,var(--accent) 55%,transparent)}
        body[data-layout="darktech"]{background:#071018;color:#e5f8ff}body[data-layout="darktech"] header{background:rgba(5,15,24,.88)}body[data-layout="darktech"] .menu,body[data-layout="darktech"] footer{color:#a9c2cc}body[data-layout="darktech"] .card,body[data-layout="darktech"] .eyebrow,body[data-layout="darktech"] .btn-outline,body[data-layout="darktech"] .domain{background:#0b1d28;color:#e6fbff;border-color:rgba(34,211,238,.17)}body[data-layout="darktech"] .card p,body[data-layout="darktech"] .hero p,body[data-layout="darktech"] .section-title p{color:#9fb6bf}
        @media(max-width:900px){.menu{display:none}.hero-grid{grid-template-columns:1fr}.visual{min-height:390px}.cards,.steps{grid-template-columns:1fr}.cta{flex-direction:column;align-items:flex-start}.hero{padding-top:64px}.footrow{flex-direction:column;align-items:flex-start}}
        @media(max-width:560px){.topbtn{display:none}.hero{padding:48px 0}.visual{padding:20px}.status{grid-template-columns:1fr}.cta{padding:30px}.section-title h2{font-size:31px}}
    </style>
</head>
<body data-layout="<?= e($site['estilo']) ?>">
<header>
    <div class="container nav">
        <a class="brand" href="#inicio"><span class="mark"><?= e($site['sigla']) ?></span><span><?= e($site['empresa']) ?></span></a>
        <nav class="menu"><a href="#servicos">Serviços</a><a href="#como-funciona">Como funciona</a><a href="#contato">Contato</a></nav>
        <a class="topbtn" href="#contato">Solicitar entrega</a>
    </div>
</header>

<main>
    <section class="hero" id="inicio">
        <div class="container hero-grid">
            <div>
                <span class="eyebrow">● Atendimento em <?= e($site['cidade']) ?></span>
                <h1><?= e($site['slogan']) ?></h1>
                <p><?= e($site['descricao']) ?></p>
                <div class="actions">
                    <a class="btn btn-primary" href="#contato"><?= e($site['cta']) ?></a>
                    <a class="btn btn-outline" href="#servicos">Ver serviços</a>
                </div>
            </div>
            <div class="visual" aria-label="Painel ilustrativo de entregas">
                <div class="bike">🏍️</div>
                <div class="status">
                    <div><b>18 min</b><span>tempo médio de coleta</span></div>
                    <div><b>98%</b><span>entregas concluídas</span></div>
                    <div><b>Ao vivo</b><span>acompanhamento da rota</span></div>
                    <div><b>Digital</b><span>comprovante de entrega</span></div>
                </div>
                <div class="route"><strong>Entrega em andamento</strong><div class="line"><i></i></div></div>
            </div>
        </div>
    </section>

    <section id="servicos">
        <div class="container">
            <div class="section-title"><h2>Soluções para sua operação</h2><p>Atendimento flexível para entregas avulsas, rotas fixas e demandas empresariais.</p></div>
            <div class="cards">
                <?php foreach ($site['servicos'] as $index => $servico): ?>
                    <article class="card"><div class="icon"><?= ['⚡','📦','📍'][$index] ?? '✓' ?></div><h3><?= e($servico) ?></h3><p>Serviço organizado, atendimento rápido e informações claras em todas as etapas.</p></article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="como-funciona">
        <div class="container">
            <div class="section-title"><h2>Como funciona</h2><p>Uma experiência simples desde a solicitação até a confirmação da entrega.</p></div>
            <div class="steps">
                <div class="step"><small>PASSO 01</small><h3>Solicite</h3><p>Informe origem, destino e detalhes do serviço.</p></div>
                <div class="step"><small>PASSO 02</small><h3>Acompanhe</h3><p>Receba atualizações enquanto o motoboy realiza a rota.</p></div>
                <div class="step"><small>PASSO 03</small><h3>Confirme</h3><p>Tenha registro da entrega concluída e do atendimento.</p></div>
            </div>
        </div>
    </section>

    <section id="contato">
        <div class="container">
            <div class="cta">
                <div><h2>Precisa de uma entrega?</h2><p>Fale com <?= e($site['empresa']) ?> e solicite atendimento.</p></div>
                <a class="btn" href="tel:<?= e($whatsapp) ?>"><?= e($site['telefone']) ?></a>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footrow">
        <span>© <?= date('Y') ?> <?= e($site['empresa']) ?>. Todos os direitos reservados.</span>
        <span class="domain">Domínio identificado: <?= e($host) ?></span>
    </div>
</footer>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(function(link){
        link.addEventListener('click', function(event){
            var target = document.querySelector(this.getAttribute('href'));
            if(target){ event.preventDefault(); target.scrollIntoView({behavior:'smooth'}); }
        });
    });
</script>
</body>
</html>
