<?php 

class UserBookController extends Controller
{

    public function list($id)
    {
        $userbooks = UserBook::findByUserId($id);
        return $this->view('userBookList', ['books' => $userbooks]);
    }

    public function findByUserId($id)
    {
        if(isset($id) && $id > 0){
            $id = (int) $id;
            if($books = UserBook::findByUserId($id)){
                return $this->view('bookList', ['books' => $books]);
            } else {
                echo("Nenhum Livro encontrado!");
                $books = Book::findAll();
                return $this->view('bookList', ['books' => $books]);
            }
        } else {
            $books = Book::findAll();
            return $this->view('bookList', ['books' => $books]);
        }
    }

    public function addBook($data)
    {
        $id_book = (int) $data['id_book'];
        $register = UserBook::findByUserId($data['id_user']) ?? [];
        foreach ($register as $book) {
            if($book->id_book == $id_book){
                return $this->list($book->id_user);
            }    
        } 
        $item = new UserBook;
            
        $item->id_user = $this->request->id_user;
        $item->id_book = $id_book;
        $item->date_time_purchase = date("Y-m-d G:i:s");
            
        if($item ->save()){
            $books = Book::findAll();
            return $this->view('bookList', ['books' => $books]);
        }
    }
}
?>