<?php  
         
namespace App\Application\LibProvas\CursoBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasCursoBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasCursoBundle';
    }
}