<?php  
         
namespace App\Application\LibProvas\ProfessorBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasProfessorBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasProfessorBundle';
    }
}