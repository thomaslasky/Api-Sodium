<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{

    /**
     * @Route("/image/{page}", methods={"GET"}, name="image")
     */
    public function getImageByPage($page)
    {
        $imageRepository = $this->getDoctrine()->getRepository(Image::class);
        $images = $imageRepository->findBy(['page'=>$page]);

        $domain = getenv('DOMAIN_NAME');
        $imgPath = getenv('IMG_PATH');

        foreach ($images as $image) {
            $src = $image->getSource();
            $image->setSource($domain.'/'.$imgPath.$src);
        }

        return $this->json(array('Response' => $images));
    }
}
