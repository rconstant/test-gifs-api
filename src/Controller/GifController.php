<?php

namespace App\Controller;

use App\Services\GifService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class GifController
 * @package App\Controller
 *
 * @Route("/gifs")
 */
class GifController extends AbstractController
{
    /**
     * @var GifService
     */
    private $gifService;

    /**
     * GifController constructor.
     * @param GifService $gifService
     */
    public function __construct(GifService $gifService)
    {
        $this->gifService = $gifService;
    }

    /**
     * @param Request $request
     * @return array
     *
     * @Route("/search", methods={"GET"})
     */
    public function search(Request $request)
    {
        $q = $request->query->has('q') ? $request->query->get('q') : null;
        $datas = $this->gifService->search($q);

        if (count($datas) === 0) {
            throw new NotFoundHttpException('No GIFs found');
        }

        return $datas;
    }
}