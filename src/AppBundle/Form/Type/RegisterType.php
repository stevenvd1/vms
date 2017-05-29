<?php
namespace AppBundle\Form\Type;

use AppBundle\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

//vul aan als je andere invoerveld-typen wilt gebruiken in je formulier
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

//EntiteitType vervangen door b.v. KlantType
class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		//gebruiken wat je nodig hebt, de id hoeft er niet bij als deze auto increment is

$builder
        ->add('username', TextType::class)

        ->add('email', EmailType::class)

        ->add('plainPassword', RepeatedType::class, [
          'type' => PasswordType::class,
          'first_options' => [
            'label' => 'Password',
          ],
          'second_options' => [
            'label' => 'Repeat Password'
          ]
        ])

        ->add('register', SubmitType::class);

		//zie
		//http://symfony.com/doc/current/forms.html#built-in-field-types
		//voor meer typen invoer
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'AppBundle\Entity\Member', //Entiteit vervangen door b.v. Klant
		));
	}
}

?>
