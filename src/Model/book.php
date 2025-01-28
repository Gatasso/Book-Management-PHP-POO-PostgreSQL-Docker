<?php 

class Book {
    public string $nome, $autor, $editora;
    public int $id, $numPaginas;
    public bool $isRead;

    public function __construct(int $id, string $nome, string $autor, string $editora, int $numPaginas, $isRead) {
        $this->nome = $nome;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->numPaginas = $numPaginas;
        $this->isRead = $isRead;
    }

    public function getId(): int {
        return $this->id;
    }
    public function getName(): string {
        return $this->nome;
    }
    public function getAuthor(): string {
        return $this->autor;
    }
    public function getEditora(): string {
        return $this->editora;
    }
    public function getNumPaginas(): int {
        return $this->numPaginas;
    }
    public function getIsRead(): string {
        return $this->isRead;
    }

    public function setName(string $nome): void {
        $this->nome = $nome;
    }
    public function setAuthor(string $autor): void {
        $this->autor = $autor;
    }
    public function setEditora(string $editora): void {
        $this->editora = $editora;
    }
    public function setNumPaginas(int $numPaginas): void {
        $this->numPaginas = $numPaginas;
    }
    public function setIsRead(bool $isRead): void {
        $this->isRead = $isRead;
    }

}
?>