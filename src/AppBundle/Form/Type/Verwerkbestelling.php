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

//EntiteitType vervangen door b.v. KlantType
class Verwerkbestelling extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is

$builder
        ->add('leverancier', TextType::class);
$builder
        ->add('bestelordernummer', IntegerType::class);
$builder
        ->add('artikelnummer', IntegerType::class);
$builder
        ->add('aantal', IntegerType::class);
        $builder
                ->add('zendingsnummer', IntegerType::class);
                $builder
                        ->add('artikelnaam', TextType::class);
                        $builder
                                ->add('locatie', TextType::class);
                                $builder
                                        ->add('keuringseisen', IntegerType::class);
		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Bestelling', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
