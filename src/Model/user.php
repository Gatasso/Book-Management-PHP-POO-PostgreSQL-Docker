<?php 

class User extends Config{
    
    public string $nome, $username, $senha;
    public int $id;

    public function __construct(int $id, string $nome, string $username, string $senha){
        $this->id = $id;   
        $this->nome = $nome;   
        $this->username = $username;   
        $this->senha = $senha;   
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNome(): string {
        return $this->nome;
    }
    public function getUsername(): string {
        return $this->username;
    }
    
    public function getSenha(): string {
        return $this->senha;
    }
    //****************************************************************************************************************************************//

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }
    
    public function setSenha(string $senha): void {
        $this->senha = password_hash($senha,CRYPT_SHA256);
    }
//****************************************************************************************************************************************//

    
}

?>