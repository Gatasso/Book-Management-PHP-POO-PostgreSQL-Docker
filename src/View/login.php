<!-- <?php include_once("./navbar.php")?> -->

<section>
    <form action="./index.php" method="GET">
        <input type="hidden" name="controller" value="UserController">
        <input type="hidden" name="method" value="login">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value= <?= $user->email ?? '' ?>>

        <label for="password">Senha</label>
        <input type="password" name="password" id="password" <?= $user->password ?? ''?>>

        <button type="submit">Enviar</button>
    </form>
</section>