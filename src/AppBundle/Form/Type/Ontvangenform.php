<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

//EntiteitType vervangen door b.v. KlantType
class Ontvangenform extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is

    $builder
            ->add('datum', DateType::class, array(
              'widget' => 'choice',
              'format' => 'dd-MMMM-yyy',
              'placeholder' => array(
                'day' => 'Dag', 'month' => 'Maand', 'year' => 'Jaar')


              )
            );

    $builder
            ->add('kwaliteit', ChoiceType::class, array(
                'choices'  => array(

                    'Goed' => 0,
                    'Slecht' => 1,
                ),
            ));
    $builder->add('status', ChoiceType::class, array(
        'choices'  => array(

            'Ontvangen' => 2,
        ),
    ));
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelopdracht', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
