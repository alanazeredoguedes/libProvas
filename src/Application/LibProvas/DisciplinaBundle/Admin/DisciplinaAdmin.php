<?php
namespace App\Application\LibProvas\DisciplinaBundle\Admin;


use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;

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

class DisciplinaAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof Disciplina
            ? $object->getStringId()
            : ''; // shown in the breadcrumb on the create view
    }

    public function getExportFields()
    {
        return array('Id' => 'id', 'Codigo' => 'codigo', 'Periodo' => 'periodo', 'Nome' => 'nome', 'Ativo' => 'ativo', 'GradeCurricular' => 'gradeCurricular.grade', );
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            
            ->add('codigo', null, [
                'label' => 'Codigo',
            ])
            ->add('periodo', null, [
                'label' => 'Periodo',
            ])
            ->add('nome', null, [
                'label' => 'Nome',
            ])
            ->add('ativo', null, [
                'label' => 'Ativo',
            ])
            ->add('gradeCurricular', null, [], EntityType::class,[
                'class' => GradeCurricular::class,
                'label' => 'Grade Curricular',
                'multiple' => true,
                'choice_label' => function ($gradeCurricular) {
                    return $gradeCurricular->getGradeCurso();
                },
            ])
            ->add('gradeCurricular.curso', null, [
                'label' => 'Curso'
            ], EntityType::class,[
                'class' => Curso::class,
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
            
            ->addIdentifier('codigo', null, [
                'label' => 'Codigo',
                
                
            ])
            ->addIdentifier('periodo', null, [
                'label' => 'Periodo',
                
                
            ])
            ->addIdentifier('nome', null, [
                'label' => 'Nome',
                
                
            ])
            ->add('ativo', null, [
                'label' => 'Ativo',
                
                 
                'editable' => true,
                'inverse'  => false,
            ])
            ->add('gradeCurricular', null, [
                'label' => 'Grade Curricular',
                'associated_property' => 'grade',
            ])
            ->add('gradeCurricular.curso', null, [
                'label' => 'Curso',
                'associated_property' => 'nome',
            ])
            ->add('provas', null, [
                'label' => 'Numero de Provas',
                'choice_label' => function ($provas) {
                    return $provas->getNumeroProvas();
                },
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
            
            ->add('codigo', TextType::class, [
                'label' => 'Codigo:',
                'required' => true,
                
                'constraints' => [ 
                    new NotNull(),
             ],
                'help' => '',
            ])
            ->add('periodo', IntegerType::class, [
                'label' => 'Periodo:',
                'required' => true,
                'constraints' => [ 
                    new NotNull(),
            
                    new Length([
                        'min' => 1,
                        'max' => 2,
                    ]), ],
                'help' => '',
            ])
            ->add('nome', TextType::class, [
                'label' => 'Nome:',
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
            ->add('gradeCurricular', ModelType::class,[
                'class' => GradeCurricular::class,
                'property' => 'gradeCurso',
                'label' => 'GradeCurricular:',
                'required' => false,
                'expanded' => false,
                'btn_add' => false,
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
            
            ->add('codigo', null, [
                'label' => 'Codigo:',
                
            ])
            ->add('periodo', null, [
                'label' => 'Periodo:',
                
            ])
            ->add('nome', null, [
                'label' => 'Nome:',
                
            ])
            ->add('ativo', null, [
                'label' => 'Ativo:',
                
            ])
            ->add('gradeCurricular.grade', null, [
                'label' => 'GradeCurricular:',
            ])
        ;
    }
    
}

