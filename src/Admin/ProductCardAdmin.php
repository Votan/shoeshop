<?php

namespace App\Admin;

use App\Entity\ProductCard;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ProductCardAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper->add('title', TextType::class);
    $formMapper->add('category', TextType::class);
    $formMapper->add('price', MoneyType::class);
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper->add('title');
    $datagridMapper->add('category');
    $datagridMapper->add('price');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper->addIdentifier('title');
    $listMapper->addIdentifier('category');
    $listMapper->addIdentifier('price');
  }
}
