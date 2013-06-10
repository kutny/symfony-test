<?php

namespace Kutny\FormTest;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;

class TestPostForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'note',
            'text',
            array(
                'label' => 'Some custom label'
                // NOTE: we should NOT set label here for the HTML coder/designer to be able to change it
            )
        );

        $builder->add('dueDate', 'date');

        $builder->add('trueFalse', new CheckboxType());

        $builder->add(
            'chooseItem',
            new ChoiceType(),
            array(
                'choices' => array(
                    1 => 'Jirka',
                    2 => 'Pepa'
                )
            )
        );

        $builder->add('email', new EmailType());
    }

    public function getName()
    {
        return 'testPost';
    }
}