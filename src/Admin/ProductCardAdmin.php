<?php

namespace App\Admin;

use App\Entity\ProductCard;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ProductCardAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper->add('title', TextType::class);
    $formMapper->add('category', TextType::class);
    $formMapper->add('price', MoneyType::class);
    $formMapper->add('image', MediaType::class, [
      'label' => 'Product image',
      'required' => false,
      'provider' => 'sonata.media.provider.image',
      'context' => 'products',
    ]);
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper->add('title');
    $datagridMapper->add('category');
    $datagridMapper->add('price');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper->addIdentifier('image');
    $listMapper->addIdentifier('title');
    $listMapper->addIdentifier('category');
    $listMapper->addIdentifier('price');
  }
}
