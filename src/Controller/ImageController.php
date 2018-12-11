<?php

namespace App\Controller;

use App\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ImageController extends AbstractController
{

    /**
     * @Route("/image", methods={"GET"}, name="image")
     */
    public function getImages()
    {
        $imageArray=[];
        $galleryArray=[];
        $domain = getenv('DOMAIN_NAME');
        $imgPath = getenv('IMG_PATH');

        $imageRepository = $this->getDoctrine()->getRepository(Image::class);
        $images = $imageRepository->findAll();

        foreach ($images as $image) {
            $src = $image->getSource();
            if ($image->getPage() === "gallery")
            {
                array_push($galleryArray,'http://'.$domain.'/'.$imgPath.$src);
            }
            else{

                $imageArray += array($image->getLabel() => 'http://'.$domain.'/'.$imgPath.$src);
            }
        }
        
        $imageArray += array('galleryImages' => $galleryArray);
        return $this->json(array('images' => $imageArray));
    }
}
