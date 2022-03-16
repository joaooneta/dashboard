<?php

    class Dashboard{
        public $data_inicio;
        public $data_fim;
        public $numero_vendas;
        public $total_vendas;
        public $clientes_ativos;
        public $clientes_inativos;
        public $total_reclamacoes;
        public $total_elogios;
        public $total_sugestoes;
        public $total_despesas;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
            return $this;
        }
    }

    class Conexao{
        private $host = 'localhost';
        private $dbname = 'dashboard';
        private $user = 'root';
        private $pass = '';

        public function conectar(){
            try{
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;

            }catch(PDOException $e){
                echo '<h1>'.$e->getMessege().'</h1>';
            }
        }
    }

    class Bd{
        private $conexao;
        private $dashboard;

        public function __construct(Conexao $conexao, Dashboard $dashboard){
            $this->conexao = $conexao->conectar();
            $this->dashboard = $dashboard;
        }

        public function getNumeroVendas(){
            $query = 'SELECT COUNT(*) as numero_vendas FROM tb_vendas WHERE data_venda BETWEEN :data_inicio AND :data_fim;';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue('data_inicio', $this->dashboard->__get('data_inicio'));
            $stmt->bindValue('data_fim', $this->dashboard->__get('data_fim'));
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
        }

        public function getTotalVendas(){

        }

        public function getClientesAtivos(){
            
        }

        public function getClientesInativos(){
            
        }

        public function getTotalReclamacoes(){

        }

        public function getTotalElogios(){

        }

        public function getTotalSugestoes(){

        }

        public function getTotalDespesas(){

        }
    }

    $dashboard = new Dashboard();
    $dashboard->__set('data_inicio', '2018-10-01');
    $dashboard->__set('data_fim', '2018-10-31');
    $conexao = new Conexao();
    $bd = new Bd($conexao, $dashboard);
    $dashboard->__set('numero_vendas', $bd->getNumeroVendas());
    print_r($dashboard);
?>