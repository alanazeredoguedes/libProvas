<?php  
         
namespace App\Application\LibProvas\ProvaBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasProvaBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasProvaBundle';
    }
}