<?php  
         
namespace App\Application\LibProvas\TipoProvaBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasTipoProvaBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasTipoProvaBundle';
    }
}