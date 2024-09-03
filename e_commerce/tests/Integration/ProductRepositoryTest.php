<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Product;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductRepositoryTest extends KernelTestCase
{
    private EntityManagerInterface $em;

    protected function setUp(): void 
    {
       self::bootKernel([
        'environment' => 'test',
        'debug' => false,
       ]);
       $this->em = self::$kernel->getContainer()->get('doctrine')->getManager();
    }

    public function testAllProducts(): void
    {
        $products = $this->em->getRepository(Product::class)->findAll();
        $this->assertEmpty($products);
        $this->assertIsArray($products);
    }

    public function testAddProduct(): void
    {
        $date = new DateTime('now');

        $category_model = (new Category())
            ->setName('Fruit')
            ->setDescription("Lorem Ipsum");
        $this->em->persist($category_model);
        $this->em->flush();

        $product_model = (new Product())
        ->setCategory($category_model)
        ->setName("Melon")
        ->setDescription("Lorem Ipsum")
        ->setPrice(12)
        ->setStock(200)
        ->setCreatedAt($date)
        ->setDiscount(2);
        $this->em->persist($product_model);
        $this->em->flush();

        $created_model_product = $this->em->getRepository(Product::class)->findOneBy(["name" => 'Melon']);
        $this->assertNotNull($created_model_product);
        $this->assertEquals('Fruit', $created_model_product->getCategory()->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        $this->em->close();
    }
}
