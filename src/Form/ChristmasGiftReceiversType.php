<?php
namespace ArnasPet\ChristmasExchange\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ChristmasGiftReceiversType extends AbstractType
{
    public function buildForm(FormBuilderInterface $form, array $options)
    {
        $form->add('receivers', 'collection', [
            'type' => new GiftReceiverType(),
            'allow_add' => true,
            'data' => [
                [],
                [],
                []
            ]
        ]);
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'christmas_gift_receivers';
    }
}
