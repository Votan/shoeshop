<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\Form\Type\BooleanType;
use Sonata\MediaBundle\Form\Type\MediaType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class BlogPostAdmin extends AbstractAdmin
{
  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper->add('title', TextType::class);
    $formMapper->add('description', TextareaType::class);
    $formMapper->add('image', MediaType::class, [
      'label' => 'Blog image',
      'required' => false,
      'provider' => 'sonata.media.provider.image',
      'context' => 'products',
    ]);
    $formMapper->add('isLatestBlog', BooleanType::class);
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper->add('image');
    $datagridMapper->add('title');
    $datagridMapper->add('description');
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper->addIdentifier('image');
    $listMapper->addIdentifier('title');
    $listMapper->addIdentifier('description');
  }
}
