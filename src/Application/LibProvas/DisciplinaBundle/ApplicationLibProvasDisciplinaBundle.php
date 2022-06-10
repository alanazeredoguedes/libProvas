<?php  
         
namespace App\Application\LibProvas\DisciplinaBundle;
                
use Symfony\Component\HttpKernel\Bundle\Bundle;
                
class ApplicationLibProvasDisciplinaBundle extends Bundle
{
    /**
    * {@inheritdoc}
    */
    public function getParent()
    {
        return 'ApplicationLibProvasDisciplinaBundle';
    }
}