 <?php 
    class Usuario{
        private $codUsuario; # int primary key auto_increment,
        private $nomeUsuario; # varchar(50),
        private $emailUsuario; # varchar(50),
        private $cpfUsuario; # char(11),
        private $nivelAcesso; # int
        public function __construct($cxCodUsuario, $cxNomeUsuario, $cxEmailUsuario, $cxCpfUsuario, $cxNivelAcesso){
            $this->codUsuario   = $cxCodUsuario;
            $this->nomeUsuario  = $cxNomeUsuario;
            $this->emailUsuario = $cxEmailUsuario;
            $this->cpfUsuario   = $cxCpfUsuario;
            $this->nivelAcesso  = $cxNivelAcesso;
        }
        public function getCodUsuario(){
            return $this->codUsuario;
        }
        public function setCodUsuario($cxCodUsuario){
            $this->nomeUsuario = $cxCodUsuario();
        }

        public function getNomeUsuario(){
            return $this->nomeUsuario;
        }
        public function setNomeUsuario($cxNomeUsuario){
            $this->nomeUsuario = $cxNomeUsuario;
        }

        public function getEmailUsuario(){
            return $this->emailUsuario;
        }
        public function setEmailUsuario($cxEmailUsuario){
            $this->emailUsuario = $cxEmailUsuario;
        }

        public function getCpfUsuario($cpfUsuario){
            return $this->cpfUsuario;
        }
        public function setCpfUsuario($cxCpfUsuario){
            $this->cpfUsuario = $cxCpfUsuario;
        }

        public function getNivelAcesso(){
            return $this->nivelAcesso;
        }
        public function setNivelAcesso($cxNivelAcesso){
            $this->nivelAcesso=$cxNivelAcesso;
        }
    }
 ?>