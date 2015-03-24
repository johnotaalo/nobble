<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ProductImages
 *
 * @ORM\Table(name="product_images")
 * @ORM\Entity
 */
class ProductImages
{
    /**
     * @var integer $imageId
     *
     * @ORM\Column(name="image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;

    /**
     * @var integer $productId
     *
     * @ORM\Column(name="product_id", type="integer", nullable=false)
     */
    private $productId;

    /**
     * @var text $imagePath
     *
     * @ORM\Column(name="image_path", type="text", nullable=false)
     */
    private $imagePath;

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
     * Get imageId
     *
     * @return integer 
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set productId
     *
     * @param integer $productId
     * @return ProductImages
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

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
     * Set imagePath
     *
     * @param text $imagePath
     * @return ProductImages
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * Get imagePath
     *
     * @return text 
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return ProductImages
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
     * @return ProductImages
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
}