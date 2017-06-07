<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


//EntiteitType vervangen door b.v. KlantType
class Bestelopdrachtform extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is
$builder
        ->add('bestelordernummer', IntegerType::class)
;
$builder
        ->add('bestelregel', IntegerType::class)
;
$builder
        ->add('leverancier', TextType::class);
$builder
        ->add('artikel', EntityType::class, array(
    // query choices from this entity
    'class' => 'AppBundle:Artikel',

    // use the User.username property as the visible option string
    'choice_label' => 'artikelnr',

    // used to render a select box, check boxes or radios
    // 'multiple' => true,

));



$builder
        ->add('aantal', IntegerType::class)
;
$builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            // ... add a choice list of friends of the current application user
        });
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
