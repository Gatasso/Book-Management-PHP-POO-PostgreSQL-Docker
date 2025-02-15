<?php 
class UserController extends Controller
{
    public function list()
    {
        $users = User::findAll();
        return $this->view('userList', ['users' => $users]);
    }

    public function create()
    {
        return $this->view('userForm');
    }

    public function save()
    {
        $user = new User;
        $user->name = $this->request->name;
        $user->username = $this->request->username;
        $user->email = $this->request->email;
        $user->password = trim(password_hash($this->request->password, PASSWORD_BCRYPT));

        if ($user->save()) {
            return $this->list();
        }
    }

    public function edit($id)
    {
        $id = (int) $id;
        $user = User::findById($id);
        return $this->view('userForm', ['user' => $user]);
    }

    public function update($id)
    {
        $id = (int) $id;
        $user = User::findById($id);

        if($user){
            $user->name = $this->request->name;
            $user->username = $this->request->username;
            $user->email = $this->request->email;
            $user->password = trim(password_hash($this->request->password, PASSWORD_BCRYPT));
            var_dump($user->password);

            if($user->save()){
                return $this->list();
            }
        } else {
            return $this->view('index.php');;
        }
    }

    public function delete($id)
    {
        $id = (int) $id;
        if(User::deleteById($id)){
            return $this->list();
        }
    }

    public function login($data)
    {
        $user = User::findByEmail($data['email']);

        if($user) {
            if(password_verify($data['password'], trim($user->password))){
                $user_books = UserBook::findByUserId($user->id);
                setcookie("LoggedUserId", $user->id, (time() + 3600));
                return $this->view('userBookList' , ['books' => $user_books]);
                var_dump($_COOKIE);
            } else {
                echo("Senha incorreta");
            }
        } else{
            echo("Email " . $data['email'] . " não encontrado.");
        } 
    }
}

?>