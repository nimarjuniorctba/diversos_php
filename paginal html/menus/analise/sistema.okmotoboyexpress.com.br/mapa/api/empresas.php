<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/db.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

function jsonResponse(array $data, int $status = 200): never
{
    http_response_code($status);
    echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function companyName(array $company): string
{
    if (strtolower(trim((string) $company['emp_tipo_cad'])) === 'f') {
        return trim((string) $company['emp_pf_nome']);
    }

    $fantasyName = trim((string) $company['emp_pj_fantasia']);
    return $fantasyName !== ''
        ? $fantasyName
        : trim((string) $company['emp_pj_razao']);
}

function companyAddress(array $company): string
{
    $notEmpty = static fn(string $value): bool => $value !== '';

    $street = implode(', ', array_filter([
        trim((string) $company['emp_end_rua']),
        trim((string) $company['emp_end_numero']),
    ], $notEmpty));

    $districtCity = implode(', ', array_filter([
        trim((string) $company['emp_end_bairro']),
        trim((string) $company['emp_end_cidade']),
    ], $notEmpty));

    $stateZipCode = implode(', ', array_filter([
        trim((string) $company['emp_end_estado']),
        trim((string) $company['emp_end_cep']),
    ], $notEmpty));

    return implode(' - ', array_filter([
        $street,
        trim((string) $company['emp_end_complemento']),
        $districtCity,
        $stateZipCode,
    ], $notEmpty));
}

try {
    $statement = db()->query("
        SELECT
            emp_id,
            emp_tipo_cad,
            emp_pf_nome,
            emp_pj_fantasia,
            emp_pj_razao,
            emp_pj_responsavel,
            emp_telefone,
            emp_celular,
            emp_email,
            emp_end_rua,
            emp_end_numero,
            emp_end_complemento,
            emp_end_bairro,
            emp_end_cidade,
            emp_end_estado,
            emp_end_cep
        FROM mod_empresas
        WHERE emp_status = 'a'
        ORDER BY emp_id
    ");

    $companies = array_map(static fn(array $company): array => [
        'codigo' => (int) $company['emp_id'],
        'ramo' => 'pizzaria',
        'nome' => companyName($company) ?: 'Empresa sem nome',
        'responsavel' => trim((string) $company['emp_pj_responsavel']),
        'telefone' => trim((string) $company['emp_telefone']),
        'whatsapp' => trim((string) $company['emp_celular']),
        'email' => trim((string) $company['emp_email']),
        'endereco' => companyAddress($company),
        'condutores' => 3,
        'plano' => '2 - Mensalista',
    ], $statement->fetchAll());

    jsonResponse([
        'ok' => true,
        'empresas' => $companies,
    ]);
} catch (Throwable $error) {
    error_log($error->getMessage());
    jsonResponse([
        'ok' => false,
        'mensagem' => 'Não foi possível consultar as empresas no banco de dados.',
    ], 500);
}
