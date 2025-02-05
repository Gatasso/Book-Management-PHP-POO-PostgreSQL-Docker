<section>
    <h2>Adicionar/Editar Livro</h2>
    <?php $book = isset($_GET['id']) ? Book::findById($_GET['id']) : null; ?>
    <form action="../Controller/bookController.php?action=save" method="POST">
        <input type="hidden" name="id" value="<?= $book['id'] ?? '' ?>">
        
        <label for="title">Título:</label>
        <input type="text" name="title" value="<?= $book['title'] ?? '' ?>" required>
        
        <label for="author">Autor:</label>
        <input type="text" name="author" value="<?= $book['author'] ?? '' ?>" required>
        
        <label for="publisher">Editora:</label>
        <input type="text" name="publisher" value="<?= $book['publisher'] ?? '' ?>">
        
        <label for="num_pages">Número de Páginas:</label>
        <input type="number" name="num_pages" value="<?= $book['numPages'] ?? '' ?>">
        
        <label for="category">Categoria:</label>
        <input type="text" name="category" value="<?= $book['category'] ?? '' ?>">
        
        <label for="is_read">Lido:</label>
        <input type="checkbox" name="is_read" <?= isset($book['isRead']) && $book['isRead'] ? 'checked' : '' ?>>
        
        <button type="submit">Salvar</button>
    </form>
</section>