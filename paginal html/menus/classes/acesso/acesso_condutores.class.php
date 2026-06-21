<?php

class acesso_condutores extends Condutores
{
    public function cadastraDados($pdo, Condutores $objeto)
    {
        try {
            if ($this->verificaEmail($pdo, $objeto->getEmail())) {
                return false;
            }

            $sql = "INSERT INTO mod_condutor (
                        con_nome,
                        con_telefone,
                        con_email,
                        con_placa,
                        con_senha
                    ) VALUES (
                        :nome,
                        :telefone,
                        :email,
                        :placa,
                        :senha
                    )";

            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
            $p_sql->bindValue(':telefone', $objeto->getTelefone(), PDO::PARAM_STR);
            $p_sql->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
            $p_sql->bindValue(':placa', $objeto->getPlaca(), PDO::PARAM_STR);
            $p_sql->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
            $p_sql->execute();

            return $p_sql->rowCount() > 0 ? $pdo->lastInsertId() : false;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function atualizaDados($pdo, Condutores $objeto)
    {
        try {
            $sql = "UPDATE mod_condutor SET
                        con_nome=:nome,
                        con_telefone=:telefone,
                        con_email=:email,
                        con_placa=:placa";

            if ($objeto->getSenha() !== '') {
                $sql .= ", con_senha=:senha";
            }

            $sql .= " WHERE con_id=:id AND con_cad_status<>:excluido";

            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':nome', $objeto->getNome(), PDO::PARAM_STR);
            $p_sql->bindValue(':telefone', $objeto->getTelefone(), PDO::PARAM_STR);
            $p_sql->bindValue(':email', $objeto->getEmail(), PDO::PARAM_STR);
            $p_sql->bindValue(':placa', $objeto->getPlaca(), PDO::PARAM_STR);

            if ($objeto->getSenha() !== '') {
                $p_sql->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
            }

            $p_sql->bindValue(':id', $objeto->getId(), PDO::PARAM_INT);
            $p_sql->bindValue(':excluido', 'e', PDO::PARAM_STR);
            $p_sql->execute();

            return true;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function retornaDados($pdo, $tipo = '', $valor = '')
    {
        try {
            if ($tipo !== 'id') {
                return false;
            }

            $sql = "SELECT * FROM mod_condutor WHERE con_id=:id";
            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':id', $valor, PDO::PARAM_INT);
            $p_sql->execute();
            $result = $p_sql->fetch(PDO::FETCH_ASSOC);

            if (!$result) {
                return false;
            }

            $objeto = new Condutores();
            $objeto->setId($result['con_id']);
            $objeto->setNome($result['con_nome']);
            $objeto->setTelefone($result['con_telefone']);
            $objeto->setEmail($result['con_email']);
            $objeto->setPlaca($result['con_placa']);
            $objeto->setSenha($result['con_senha']);
            $objeto->setStatusCadastro($result['con_cad_status']);
            $objeto->setStatusApp($result['con_app_status']);
            $objeto->setDtCadastro($result['con_dt_cadastro']);

            return $objeto;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function listarDados($pdo, $tipo = '', $valor = '')
    {
        try {
            $sql = "SELECT con_id
                      FROM mod_condutor
                     WHERE con_cad_status<>:excluido
                  ORDER BY con_id DESC";

            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':excluido', 'e', PDO::PARAM_STR);
            $p_sql->execute();
            $objetos = array();

            while ($result = $p_sql->fetch(PDO::FETCH_ASSOC)) {
                $objetos[] = $this->retornaDados($pdo, 'id', $result['con_id']);
            }

            return $objetos;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function verificaEmail($pdo, $email, $ignorarId = 0)
    {
        try {
            $sql = "SELECT con_id
                      FROM mod_condutor
                     WHERE con_email=:email
                       AND con_cad_status<>:excluido";

            if ((int)$ignorarId > 0) {
                $sql .= " AND con_id<>:ignorar_id";
            }

            $sql .= " LIMIT 1";
            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':email', $email, PDO::PARAM_STR);
            $p_sql->bindValue(':excluido', 'e', PDO::PARAM_STR);

            if ((int)$ignorarId > 0) {
                $p_sql->bindValue(':ignorar_id', $ignorarId, PDO::PARAM_INT);
            }

            $p_sql->execute();
            return (bool)$p_sql->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function alteraStatus($pdo, $id, $status)
    {
        try {
            if (!in_array($status, array('a', 'i'), true)) {
                return false;
            }

            $sql = "UPDATE mod_condutor
                       SET con_cad_status=:status
                     WHERE con_id=:id
                       AND con_cad_status<>:excluido";

            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':status', $status, PDO::PARAM_STR);
            $p_sql->bindValue(':id', $id, PDO::PARAM_INT);
            $p_sql->bindValue(':excluido', 'e', PDO::PARAM_STR);
            $p_sql->execute();

            return $p_sql->rowCount() > 0;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }

    public function atualizaSenha($pdo, Condutores $objeto)
    {
        $sql = "UPDATE mod_condutor SET con_senha=:senha
                 WHERE con_id=:id AND con_cad_status<>:excluido";
        $p_sql = $pdo->prepare($sql);
        $p_sql->bindValue(':senha', $objeto->getSenha(), PDO::PARAM_STR);
        $p_sql->bindValue(':id', $objeto->getId(), PDO::PARAM_INT);
        $p_sql->bindValue(':excluido', 'e', PDO::PARAM_STR);
        $p_sql->execute();
        return $p_sql->rowCount() > 0;
    }

    public function Deletar($pdo, $valor = '')
    {
        try {
            $sql = "UPDATE mod_condutor
                       SET con_cad_status=:status,
                           con_app_status=:app_status
                     WHERE con_id=:id";

            $p_sql = $pdo->prepare($sql);
            $p_sql->bindValue(':status', 'e', PDO::PARAM_STR);
            $p_sql->bindValue(':app_status', 'i', PDO::PARAM_STR);
            $p_sql->bindValue(':id', $valor, PDO::PARAM_INT);
            $p_sql->execute();

            return $p_sql->rowCount() > 0;
        } catch (Exception $e) {
            die('Erro: ' . $e->getMessage());
        }
    }
}
