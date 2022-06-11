<?php  
         
namespace App\Application\LibProvas\GradeCurricularBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasGradeCurricularBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasGradeCurricularBundle';
    }
}