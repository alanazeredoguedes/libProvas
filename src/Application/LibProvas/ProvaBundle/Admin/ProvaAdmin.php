<?php
namespace App\Application\LibProvas\ProvaBundle\Admin;


use App\Application\LibProvas\CursoBundle\Entity\Curso;
use App\Application\LibProvas\GradeCurricularBundle\Entity\GradeCurricular;
use App\Application\LibProvas\TipoProvaBundle\Entity\TipoProva;
use App\Application\LibProvas\DisciplinaBundle\Entity\Disciplina;
use App\Application\LibProvas\ProfessorBundle\Entity\Professor;
use App\Application\LibProvas\ProvaBundle\Entity\Prova;

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

class ProvaAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object instanceof Prova
            ? $object->getStringId()
            : ''; // shown in the breadcrumb on the create view
    }

    public function getExportFields()
    {
        return array('Id' => 'id', 'Data' => 'data', 'Ativa' => 'ativa', 'TipoProva' => 'tipoProva.tipo', 'Disciplina' => 'disciplina.nome', 'Professor' => 'professor.nome', );
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
        //$collection->remove('create');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            
            ->add('data', null, [
                'label' => 'Data',
            ])
            ->add('ativa', null, [
                'label' => 'Ativa',
            ])
            ->add('tipoProva', null, [], EntityType::class,[
                'class' => TipoProva::class,
                'label' => 'TipoProva',
                'multiple' => true,
                'choice_label' => function ($tipoProva) {
                    return $tipoProva->getTipo();
                },
            ])
            ->add('disciplina', null, [], EntityType::class,[
                'class' => Disciplina::class,
                'label' => 'Disciplina',
                'multiple' => true,
                'choice_label' => function ($disciplina) {
                    return $disciplina->getCodigo() . ' - ' .
                            $disciplina->getNome() . ' - ' .
                            $disciplina->getGradeCurricular()->getGrade() . ' - ' .
                            $disciplina->getGradeCurricular()->getCurso()->getNome();
                },
            ])
            ->add('professor', null, [], EntityType::class,[
                'class' => Professor::class,
                'label' => 'Professor',
                'multiple' => true,
                'choice_label' => function ($professor) {
                    return $professor->getNome();
                },
            ])
            ->add('disciplina.gradeCurricular', null, [
                'label' => 'Grade'
            ], EntityType::class,[
                'class' => GradeCurricular::class,
                'multiple' => true,
                'choice_label' => function ($grade) {
                    return $grade->getGrade() . ' - ' . $grade->getCurso()->getNome();
                },
            ])
            ->add('disciplina.gradeCurricular.curso', null, [
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
            ->add('ativa', null, [
                'label' => 'Ativa',
                'editable' => true,
                'inverse'  => false,
            ])
            ->addIdentifier('tipoProva', null, [
                'label' => 'TipoProva',
                'associated_property' => 'tipo',
            ])
            ->addIdentifier('disciplina', null, [
                'label' => 'Disciplina',
                'associated_property' => 'nome',
            ])
            ->addIdentifier('disciplina.gradeCurricular', null, [
                'label' => 'Grade',
                'associated_property' => 'grade',
            ])
            ->addIdentifier('disciplina.gradeCurricular.curso', null, [
                'label' => 'Curso',
                'associated_property' => 'nome',
            ])
            ->addIdentifier('professor', null, [
                'label' => 'Professor',
                'associated_property' => 'nome',
            ])
            ->addIdentifier('data', null, [
                'label' => 'Data',
                'format' => 'd/m/Y',
            ])
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ])
        ;
    }
    
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->with('General', ['class' => 'col-md-7'])

                ->add('disciplina', ModelType::class,[
                    'class' => Disciplina::class,
                    'property' => 'disciplinaGradeCurso',
                    'label' => 'Disciplina:',
                    'required' => true,
                    'expanded' => false,
                    'btn_add' => false,
                    'help' => '',
                ])
                ->add('tipoProva', ModelType::class,[
                    'class' => TipoProva::class,
                    'property' => 'tipo',
                    'label' => 'TipoProva:',
                    'required' => true,
                    'expanded' => false,
                    'btn_add' => false,
                    'help' => '',
                ])
                ->add('professor', ModelType::class,[
                    'class' => Professor::class,
                    'property' => 'nome',
                    'label' => 'Professor:',
                    'required' => false,
                    'expanded' => false,
                    'help' => '',
                ])


            ->end()

            ->with('Arquivos', ['class' => 'col-md-5'])

                ->add('arquivos', ModelListType::class,[
                    'label' => 'Arquivos: ',
                    'btn_list' => false,
                ],[
                    'link_parameters' => [
                        //'context' => 'default',
                        // 'hide_context' => true,
                    ],
                ])

                ->add('data', DateType::class, [
                    'label' => 'Data:',
                    'required' => false,
                    'widget' => 'single_text',
                    'constraints' => [  ],
                    'help' => '',
                ])

                ->add('ativa', CheckboxType::class, [
                    'label' => 'Ativa:',
                    'required' => false,

                    'constraints' => [  ],
                    'help' => '',
                ])

            ->end()

        ;
    }
    
    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id', null, [
                'label' => 'Id:',
            ])
            
            ->add('data', null, [
                'label' => 'Data:',
                'format' => 'd/m/Y',
            ])
            ->add('ativa', null, [
                'label' => 'Ativa:',
                
            ])
            ->add('tipoProva.tipo', null, [
                'label' => 'TipoProva:',
            ])
            ->add('disciplina.nome', null, [
                'label' => 'Disciplina:',
            ])
            ->add('professor.nome', null, [
                'label' => 'Professor:',
            ])
        ;
    }
    
}

