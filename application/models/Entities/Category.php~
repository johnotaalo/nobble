<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer $categoryId
     *
     * @ORM\Column(name="category_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $categoryId;

    /**
     * @var string $categoryName
     *
     * @ORM\Column(name="category_name", type="string", length=255, nullable=false)
     */
    private $categoryName;

    /**
     * @var text $categoryDescription
     *
     * @ORM\Column(name="category_description", type="text", nullable=false)
     */
    private $categoryDescription;

    /**
     * @var integer $isActive
     *
     * @ORM\Column(name="is_active", type="integer", nullable=false)
     */
    private $isActive;

    /**
     * @var datetime $createdOn
     *
     * @ORM\Column(name="created_on", type="datetime", nullable=false)
     */
    private $createdOn;


    /**
     * Get categoryId
     *
     * @return integer 
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return Category
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set categoryDescription
     *
     * @param text $categoryDescription
     * @return Category
     */
    public function setCategoryDescription($categoryDescription)
    {
        $this->categoryDescription = $categoryDescription;
        return $this;
    }

    /**
     * Get categoryDescription
     *
     * @return text 
     */
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Category
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
     * Set createdOn
     *
     * @param datetime $createdOn
     * @return Category
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * Get createdOn
     *
     * @return datetime 
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }
}