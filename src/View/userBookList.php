<?php
include_once("./navbar.php");
if (!is_null($books) && count($books) > 0) {
    echo "<p>Número de livros: " . count($books) . "</p>";
?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Páginas</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) { ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><?= $book->title ?></td>
                    <td><?= $book->author ?></td>
                    <td><?= $book->publisher ?></td>
                    <td><?= $book->num_pages ?></td>
                    <td><?= $book->category ?></td>
                    <td>
                        <a href="./index.php?controller=UserBookController&method=edit&id=<?= $book->id ?>">Editar</a> 
                        <a href="./index.php?controller=UserBookController&method=delete&id=<?= $book->id ?>">Excluir</a>
                        <?php if (isset($user->id)) { ?>
                            <a href="./index.php?controller=UserBookController&method=addBook&id_book=<?= $book->id ?>&id_user=<?= $_COOKIE['LoggedUserId'] ?>">Adicionar à Lista</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php
} else {
    echo "
        <h3>Oooops. Parece que você ainda não tem livros em sua coleção</h3>
        <p><a href='./index.php?controller=BookController&method=list'>Pesquise Livros para adicionar</a></p>
    ";
}
?>
