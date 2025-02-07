<div>
    <h2>Adicionar/Editar Livro</h2>
    <?php 
        $book = isset($_GET['id']) ? Book::findById($_GET['id']) : null; 
    ?>
    <div>
        <form action="./index.php?controller=BookController&method=<?= isset($book->id) ? "update&id={$book->id}" : "save"; ?>" method="POST">
            
            <input type="hidden" name="id" value="<?= $book->id ?? '' ?>">

            <label for="title">Título:</label>
            <input type="text" name="title" value="<?= $book->title ?? '' ?>" required>

            <label for="author">Autor:</label>
            <input type="text" name="author" value="<?= $book->author ?? '' ?>" required>
            
            <label for="publisher">Editora:</label>
            <input type="text" name="publisher" value="<?= $book->publisher ?? '' ?>">
            
            <label for="num_pages">Número de Páginas:</label>
            <input type="number" name="num_pages" value="<?= $book->num_pages ?? '' ?>">
            
            <label for="category">Categoria:</label>
            <input type="text" name="category" value="<?= $book->category ?? '' ?>">
            
            <label for="is_read">Lido:</label>
            <input type="checkbox" name="is_read" value="True" <?= isset($book->is_read) && $book->is_read ? 'checked' : '' ?>>
            
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>
