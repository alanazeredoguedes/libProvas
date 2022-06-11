<?php
namespace App\Application\LibProvas\GradeCurricularBundle\Admin;


use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Sonata\AdminBundle\Route\RouteCollection;

//Types Symfony Form Types
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\BaseType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\TransformationFailureExtension;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\WeekType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

class GradeCurricularAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof GradeCurricular
            ? $object->getStringId()
            : ''; // shown in the breadcrumb on the create view
    }

    public function getExportFields()
    {
        return array('Id' => 'id', 'Grade' => 'grade', 'Descricao' => 'descricao', 'Ativo' => 'ativo', 'Curso' => 'curso.nome', );
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            
            ->add('grade', null, [
                'label' => 'Grade',
            ])
            ->add('descricao', null, [
                'label' => 'Descricao',
            ])
            ->add('ativo', null, [
                'label' => 'Ativo',
            ])
            ->add('curso', null, [], EntityType::class,[
                'class' => Curso::class,
                'label' => 'Curso',
                'multiple' => true,
                'choice_label' => function ($curso) {
                    return $curso->getNome();
                },
            ])
        ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        unset($this->listModes['mosaic']);

        $listMapper
            //->addIdentifier('id')
            
            ->addIdentifier('grade', null, [
                'label' => 'Grade',
                
                
            ])
            ->addIdentifier('descricao', null, [
                'label' => 'Descricao',
                
                
            ])
            ->add('ativo', null, [
                'label' => 'Ativo',
                
                 
                'editable' => true,
                'inverse'  => false,
            ])
            ->add('curso', null, [
                'label' => 'Curso',
                'associated_property' => 'nome',
            ])          
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }
    
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            
            ->add('grade', TextType::class, [
                'label' => 'Grade:',
                'required' => true,
                
                'constraints' => [ 
                    new NotNull(),
             ],
                'help' => '',
            ])
            ->add('descricao', TextType::class, [
                'label' => 'Descricao:',
                'required' => true,
                
                'constraints' => [ 
                    new NotNull(),
             ],
                'help' => '',
            ])
            ->add('ativo', CheckboxType::class, [
                'label' => 'Ativo:',
                'required' => false,
                
                'constraints' => [  ],
                'help' => '',
            ])
            ->add('curso', ModelType::class,[
                'class' => Curso::class,
                'property' => 'nome',
                'label' => 'Curso:',
                'required' => true,
                'btn_add' => false,
                'expanded' => false,
                'help' => '',
            ])
        ;
    }
    
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id', null, [
                'label' => 'Id:',
            ])
            
            ->add('grade', null, [
                'label' => 'Grade:',
                
            ])
            ->add('descricao', null, [
                'label' => 'Descricao:',
                
            ])
            ->add('ativo', null, [
                'label' => 'Ativo:',
                
            ])
            ->add('curso.nome', null, [
                'label' => 'Curso:',
            ])
        ;
    }
    
}

