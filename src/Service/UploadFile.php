<?php
// src/Service/FileUploader.php
namespace App\Service;

use App\Application\Sonata\MediaBundle\Entity\Gallery;
use App\Application\Sonata\MediaBundle\Entity\GalleryHasMedia;
use App\Application\Sonata\MediaBundle\Entity\Media;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Process\Process;

class UploadFile
{
    private $targetDirectory;
    public $em;
    public $projectDir;
    public $uploadDir = 'media/padrao/0001/01';


    private $providers = [
        'application/pdf' => 'sonata.media.provider.file',
        /*'application/x-pdf' => 'sonata.media.provider.file',
        'application/rtf' => 'sonata.media.provider.file',
        'text/html' => 'sonata.media.provider.file',
        'text/rtf' => 'sonata.media.provider.file',
        'text/plain' => 'sonata.media.provider.file',*/

        'image/jpg' => 'sonata.media.provider.image',
        'image/jpeg' => 'sonata.media.provider.image',
        'image/png' => 'sonata.media.provider.image',
        /*'image/x-png' => 'sonata.media.provider.image',*/
    ];

    /**
     * @param $targetDirectory
     */
    public function __construct($targetDirectory){
        $this->targetDirectory = $targetDirectory;
    }

    public function setEntityMananger($em){
        $this->em = $em;
    }

    public function getEntityMananger(){
        return $this->em;
    }

    public function setProjectDir($projectDir){
        $this->projectDir = $projectDir;
    }

    public function getProjectDir(){
        return $this->projectDir;
    }

    public function getTargetDirectory(){
        return $this->targetDirectory;
    }

    

    public function upload(UploadedFile $file, $folder)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
        
        try {
            $file->move($this->getTargetDirectory().$folder, $fileName);
        } catch (FileException $e) {
        }

        return $fileName;
    }

    private function getProviderName(UploadedFile $file){
        return $this->providers[$file->getClientMimeType()];
    }

    public function syncThumbnails()
    {
        $process = Process::fromShellCommandline('bin/console sonata:media:sync-thumbnails sonata.media.provider.image padrao', $this->projectDir,  null, null );
        $process->run();
    }

    public function createMedia(UploadedFile $file){

        /** Enviando arquivo */
        $fileName = $this->upload($file, 'media/padrao/0001/01');

        $media = new Media();

        $media->setName($file->getClientOriginalName());
        $media->setDescription(null);
        $media->setEnabled(true);
        $media->setProviderName($this->getProviderName($file));
        $media->setProviderStatus(1);
        $media->setProviderMetadata(["filename"=>$file->getClientOriginalName()]);
        $media->setWidth(300);
        $media->setHeight(100);
        $media->setLength(1544);
        $media->setProviderReference($file->getClientOriginalName());
        $media->setContentType($file->getClientMimeType());
        $media->setContext('padrao');
        $media->setProviderReference($fileName);

        $this->em->persist($media);
        $this->em->flush($media);

        $this->syncThumbnails();

        return $media;
    }

    public function createGallery($files, $name = 'gallery', $enabled = true, $context = 'padrao')
    {
        if(empty($files))
            return false;

        $gallery = new Gallery();

        $gallery->setName($name);
        $gallery->setEnabled($enabled);
        $gallery->setContext($context);

        foreach ($files as $file){
            $media = $this->createMedia($file);

            $galleryHasMedia = new GalleryHasMedia();

            $galleryHasMedia->setGallery($gallery);
            $galleryHasMedia->setMedia($media);
            $galleryHasMedia->setEnabled(true);

            $this->em->persist($media);
            $this->em->persist($gallery);
            $this->em->persist($galleryHasMedia);

            $this->em->flush();
        }

        return $gallery;
    }








}

?>