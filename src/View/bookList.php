<?php include_once("./navbar.php")?>
<div>
    <h1>Lista de Livros</h1>

    <form action="./index.php" method="GET">
        <input type="hidden" name="controller" value="UserBookController">
        <input type="hidden" name="method" value="findByUserId">
        
        <label for="id">ID User:</label>
        <input type="number" name="id" id="id" value= <?= $user->id ?? '' ?>>
        <button type="submit">Filtrar</button>
    </form>

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
            <?php
                
                echo "Número de livros: " . count($books);

                
                foreach ($books as $book) {  
                    echo "<tr>
                    <td>{$book->id}</td>
                    <td>{$book->title}</td>
                    <td>{$book->author}</td>
                    <td>{$book->publisher}</td>
                    <td>{$book->num_pages}</td>
                    <td>{$book->category}</td>

                    <td>
                    <a href='./index.php?controller=BookController&method=edit&id={$book->id}'>Editar</a> |
                    <a href='./index.php?controller=BookController&method=delete&id={$book->id}'>Excluir</a> |
                    <a href='./index.php?controller=UserBookController&method=addBook&id_book={$book->id}&id_user={$_COOKIE['LoggedUserId']}'>Adicionar à Lista</a>
                    </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
