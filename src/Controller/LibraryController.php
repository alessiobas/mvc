<?php

namespace App\Controller;

use App\Controller;
use App\Repository\LibraryRepository;
use App\Entity\Library;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    /**
    * @Route("/library/show", name="library_show_all")
    */
    public function showAllBooks(
        LibraryRepository $libraryRepository
    ): Response {
        $books = $libraryRepository
            ->findAll();

        $data = [
                "books" => $books
            ];

        return $this->render('library/show-books.html.twig', $data);
    }

    /**
     * @Route("/library/show/{id}", name="book_id")
     */
    public function showBook(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository
            ->find($id);
        $data = [
                "book" => $book
            ];
        return $this->render('library/show-book.html.twig', $data);
    }

    /**
     * @Route("/library/create", name="create_book", methods={"GET", "HEAD"})
     */
    public function createBook(): Response
    {
        return $this->render('library/create-book-form.html.twig', []);
    }

    /**
     * @Route("/library/create", name="create_book_process", methods={"POST"})
     */
    public function createBookSession(
        Request $request,
        ManagerRegistry $doctrine
    ): Response {
        $entityManager = $doctrine->getManager();

        $title_ = $request->request->get("_title");
        $author_ = $request->request->get("_author");
        $isbn_ = $request->request->get("_isbn");
        $imgUrl_ = $request->request->get("_imageUrl");

        $books = new Library();
        $books->setTitel($title_);
        $books->setAuthor($author_);
        $books->setIsbn($isbn_);
        $books->setImage($imgUrl_);

        // tell Doctrine you want to (eventually) save the Product
        // (no queries yet)
        $entityManager->persist($books);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/update/{id}", name="update_book_id", methods={"GET", "HEAD"})
     */
    public function updateBook(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $book = $libraryRepository
            ->find($id);

        $data = [
                "book" => $book
            ];

        return $this->render('library/update-book.html.twig', $data);
    }

    /**
     * @Route("/library/update/{id}", name="update_book_id_process", methods={"POST"})
     */
    public function updateBookSession(
        Request $request,
        ManagerRegistry $doctrine,
        LibraryRepository $libraryRepository
    ): Response {
        $entityManager = $doctrine->getManager();

        $id_ = $request->request->get("_id");
        $title_ = $request->request->get("_title");
        $author_ = $request->request->get("_author");
        $isbn_ = $request->request->get("_isbn");
        $imgUrl_ = $request->request->get("_imageUrl");

        $books = $libraryRepository
            ->find($id_);
        ;
        $books->setTitel($title_);
        $books->setAuthor($author_);
        $books->setIsbn($isbn_);
        $books->setImage($imgUrl_);

        // tell Doctrine you want to (eventually) save the Product
        // (no queries yet)
        $entityManager->persist($books);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }

    /**
     * @Route("/library/delete/{id}", name="delete_book_id")
     */
    public function deleteBook(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $book = $entityManager->getRepository(Library::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
}
