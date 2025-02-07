<?php 
class BookController extends Controller
{
    public function list()
    {
        $books = Book::findAll();
        return $this->view('grade',['books' => $books]);
    }

    public function create()
    {
        return $this->view('form');
    }

    public function edit($id)
    {
        $id = (int) $id;
        $book = Book::findById($id);
        return $this->view('form', ['book' => $book]);
    }

    public function save()
    {
        $book = new Book;

        $book->title = $this->request->title;
        $book->author = $this->request->author;
        $book->publisher = $this->request->publisher;
        $book->num_pages = $this->request->num_pages;
        $book->category = $this->request->category;
        $book->is_read = $this->request->is_read;

        if ($book->save()) {
            return $this->list();
        }
    }
    
    public function update($id)
    {
        $id = (int) $id;
        $book = Book::findById($id);

        $book->title = $this->request->title;
        $book->author = $this->request->author;
        $book->publisher = $this->request->publisher;
        $book->num_pages = $this->request->num_pages;
        $book->category = $this->request->category;
        $book->is_read = $this->request->is_read;

        $book->save();
        return $this->list();
        
    }

    public function delete($id)
    {
        $id = (int)$id;
        if (Book::deleteById($id)) {
            return $this->list();
        }
    }
}
?>