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
        $user->password = $this->request->password;

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
            $user->password = $this->request->password;

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

}

?>