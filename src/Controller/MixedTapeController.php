<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class MixedTapeController extends AbstractController {
    
    #[Route('/', name: 'app_homepage')]

    public function homepage ():Response {
        // die('Mixed-Taped: Surely, not fancy looking page');
        // return new Response('Pink Floyd --- Another Brick in the wall');

        $tracks = [
            ['Song' => 'Gangsta\'s Paradise', 'Artist' => 'Coolio'],
            ['Song' => 'Waterfalls', 'Artist' => 'TLC'],
            ['Song' => 'Kiss from a rose', 'Artist' => 'Seal'],
            ['Song' => 'On bended knee', 'Artist' => 'Boys II Men'],
            ['Song' => 'Fantasy', 'Artist' => 'Mariah Carey'],
            ['Song' => 'Dear mama', 'Artist'=> '2pac Shakur']
        ];

        // dd($tracks);
        // dump($tracks);

        return $this->render('mixed/homepage.html.twig', [
            'title' => 'Mixed 90s music',
            'tracks' => $tracks
        ]);
    }

    #[Route('/browse/{slug}', name:"app_browse")]

    public function browse (string $slug = null): Response {
        $title = str_replace('-', ' ', $slug);
        // die('Mixed-Taped: Surely, not fancy looking page');

        $genre = $slug ? u(str_replace('-', '', $slug))->title(true) : null;
    
        return $this->render('mixed/browse.html.twig', [
            'genre' => $genre,
            
        ]);
        // return new Response('Mixed-Taped: Surely, not fancy looking page');
    }


}

