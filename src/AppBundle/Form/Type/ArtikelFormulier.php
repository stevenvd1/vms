<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

//EntiteitType vervangen door b.v. KlantType
class ArtikelFormulier extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is

$builder
        ->add('naam', TextType::class);
$builder
        ->add('specs', TextType::class)
;
$builder
        ->add('locatie', IntegerType::class)
;
$builder
        ->add('inkoopprijs', TextType::class)
;
$builder
        ->add('MinVoorraad', IntegerType::class)
;
$builder
        ->add('Voorraad', IntegerType::class)
;
$builder
        ->add('bestelserie', IntegerType::class)
;
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Artikel', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
