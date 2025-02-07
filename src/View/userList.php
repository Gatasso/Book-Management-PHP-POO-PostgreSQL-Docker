<section>
    <h2>Lista dos Usuários</h2>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Username</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            echo"Número de Usuários Cadastrados: " . count($users);

            foreach ($users as $user) {
                echo "<tr>
                <td>{$user->id}</td>
                <td>{$user->name}</td>
                <td>{$user->username}</td>
                <td>{$user->email}</td>
                
                <td>
                    <a href='./index.php/?controller=UserController&method=edit&id={$user->id}'>Editar</a> |
                    <a href='./index.php/?controller=UserController&method=delete&id={$user->id}'>Excluir</a>
                </td>
                </tr>";
            }
            
            ?>
        </tbody>
    </table>
</section>