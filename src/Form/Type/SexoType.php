<?php
/**
 * Created by PhpStorm.
 * User: gilso_nb9zlec
 * Date: 13/03/2018
 * Time: 10:11
 */

namespace App\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SexoType extends AbstractType
{
    public function getParent()
    {
        return ChoiceType::class;
    }
}