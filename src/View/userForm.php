<div>
    <h2>Criar/Editar Usuário</h2>
    <?php 
        $user = isset($_GET['id']) ? User::findById($_GET['id']) : null; 
    ?>
    <div>
        <form action="./index.php?controller=UserController&method=<?= isset($user->id) ? "update&id={$user->id}" : "save"; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $user->id ?? '' ?>">
            
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" value="<?= $user->name ?? '' ;?>" required>
            
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?= $user->username ?? '' ;?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= $user->email ?? ''?>" required>
            
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" value="<?= $user->password ?? ''?>" required>
            
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>