<h1>Lista de Livros</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once __DIR__ . '/../Controller/bookController.php';
                $controller = new BookController();
                $books = $controller->list();
                
                foreach ($books['books'] as $book) {
                    echo "<tr>
                            <td>{$book['id']}</td>
                            <td>{$book['title']}</td>
                            <td>{$book['author']}</td>
                            <td>
                                <a href='../Controller/bookController.php?action=edit&id={$book['id']}'>Editar</a> |
                                <a href='../Controller/bookController.php?action=delete&id={$book['id']}'>Excluir</a>
                            </td>
                          </tr>";
                }
            ?>
        </tbody>
    </table>