<?php 
// include_once("./controller.php");
class BookController extends Controller
{
    public function list()
    {
        $books = Book::findAll();
        return ['books' => $books];
    }

    public function create()
    {
        return $this->view('form');
    }

    public function edit($data)
    {
        $id = $data['id'];
        $book = Book::findById($id);
        return $this->view('form', ['book' => $book]);
    }

    public function save($data)
    {
        $id = isset($data['id']) ? $data['id'] : null;
        $book = $id ? Book::findById($id) : new Book;

        $book->title = $this->request->title;
        $book->author = $this->request->author;
        $book->publisher = $this->request->publisher;
        $book->numPages = $this->request->num_pages;
        $book->category = $this->request->category;
        $book->isRead = $this->request->is_read;

        if ($book->save()) {
            return $this->list();
        }
    }

    public function delete($data)
    {
        $id = $data['id'];
        if (Book::deleteById($id)) {
            return $this->list();
        }
    }
}
?>