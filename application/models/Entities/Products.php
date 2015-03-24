<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity
 */
class Products
{
    /**
     * @var integer $productId
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $productId;

    /**
     * @var string $productName
     *
     * @ORM\Column(name="product_name", type="string", length=255, nullable=false)
     */
    private $productName;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var float $price
     *
     * @ORM\Column(name="price", type="float", nullable=false)
     */
    private $price;

    /**
     * @var integer $isActive
     *
     * @ORM\Column(name="is_active", type="integer", nullable=false)
     */
    private $isActive;

    /**
     * @var datetime $addedOn
     *
     * @ORM\Column(name="added_on", type="datetime", nullable=false)
     */
    private $addedOn;

    /**
     * @var integer $categoryId
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     */
    private $categoryId;


    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return Products
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Products
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Products
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set addedOn
     *
     * @param datetime $addedOn
     * @return Products
     */
    public function setAddedOn($addedOn)
    {
        $this->addedOn = $addedOn;
        return $this;
    }

    /**
     * Get addedOn
     *
     * @return datetime 
     */
    public function getAddedOn()
    {
        return $this->addedOn;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     * @return Products
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}