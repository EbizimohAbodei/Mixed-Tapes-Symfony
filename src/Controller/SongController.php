<?php 
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use function Symfony\Component\String\u;

class SongController extends AbstractController {
    
    #[Route('/api/song/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]

    public function getSong (int $id, LoggerInterface $logger):Response {

        // dd($id);

        $logger->Info('Retrun API response for {song}', ['song' => $id]);

        $song = [
            'id' => $id,
            'name' => 'Old Finnish Song',
            'url' => 'https://vevosongs.com/wp-content/uploads/2020/10/Coolio_-_Gangstas_Paradise.mp3'
        ];

        // $song = str_replace('-', ' ', $slug);
        // // die('Mixed-Taped: Surely, not fancy looking page');

        // $genre = $slug ? u(str_replace('-', '', $slug))->title(true) : null;
    
        // return $this->render('mixed/browse.html.twig', [
        //     'genre' => $genre,
            
        // ]);
        return new JsonResponse($song);

    }


}

