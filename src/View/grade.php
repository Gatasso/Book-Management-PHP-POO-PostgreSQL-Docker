<div>
    <h1>Lista de Livros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Páginas</th>
                <th>Categoria</th>
                <th>Lido</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                echo "Número de livros: " . count($books);
                
                foreach ($books as $book) {  // Itera nos livros retornados pelo controlador
                    echo "<tr>
                    <td>{$book->id}</td>
                    <td>{$book->title}</td>
                    <td>{$book->author}</td>
                    <td>{$book->publisher}</td>
                    <td>{$book->num_pages}</td>
                    <td>{$book->category}</td>
                    <td>{$book->is_read}</td>

                    <td>
                    <a href='./index.php?controller=BookController&method=edit&id={$book->id}'>Editar</a> |
                    <a href='./index.php?controller=BookController&method=delete&id={$book->id}'>Excluir</a>
                    </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</div>
