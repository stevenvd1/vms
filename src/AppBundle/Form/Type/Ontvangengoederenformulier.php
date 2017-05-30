<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



//EntiteitType vervangen door b.v. KlantType
class Ontvangengoederenformulier extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is


    $builder

                ->add('Datum', DateType::class, array(
    'widget' => 'single_text',
  ));
$builder
        ->add('hoeveelheid', TextType::class);
$builder
        ->add('kwaliteit', ChoiceType::class, array(
    'choices' => array(
        'Main Statuses' => array(
            'Yes' => 'stock_yes',
            'No' => 'stock_no',
        ))));
$builder
        ->add('artikelnummer', IntegerType::class);
$builder
        ->add('omschrijving', TextType::class);
$builder
        ->add('leverancier', TextType::class);
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Ontvangengoederen', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
