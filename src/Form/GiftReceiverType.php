<?php

namespace ArnasPet\ChristmasExchange\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;

class GiftReceiverType extends AbstractType
{
    public function buildForm(FormBuilderInterface $form, array $options)
    {
        $form->add('name', 'text')
            ->add('email', 'email');
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'gift_receiver';
    }
}
