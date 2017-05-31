<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;



//EntiteitType vervangen door b.v. KlantType
class ArtikelZoekArtikelnummerForm extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{
//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is


$builder
->add('artikelnr', NumberType::class, array( 'required' => true, 'invalid_message' => "Een artikelnummer mag enkel uit cijfers bestaan.")) //naam is b.v. een attribuut of variabele van klant
;


//zie
//http://symfony.com/doc/current/forms.html#built-in-field-types
//voor meer typen invoer
}

}

?>
