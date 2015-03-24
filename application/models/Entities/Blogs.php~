<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Blogs
 *
 * @ORM\Table(name="blogs")
 * @ORM\Entity
 */
class Blogs
{
    /**
     * @var integer $blogId
     *
     * @ORM\Column(name="blog_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blogId;

    /**
     * @var integer $topicId
     *
     * @ORM\Column(name="topic_id", type="integer", nullable=false)
     */
    private $topicId;

    /**
     * @var string $blogName
     *
     * @ORM\Column(name="blog_name", type="string", length=255, nullable=false)
     */
    private $blogName;

    /**
     * @var text $blogContent
     *
     * @ORM\Column(name="blog_content", type="text", nullable=false)
     */
    private $blogContent;

    /**
     * @var integer $published
     *
     * @ORM\Column(name="published", type="integer", nullable=false)
     */
    private $published;

    /**
     * @var text $blogCover
     *
     * @ORM\Column(name="blog_cover", type="text", nullable=false)
     */
    private $blogCover;

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
     * @var datetime $publishedOn
     *
     * @ORM\Column(name="published_on", type="datetime", nullable=false)
     */
    private $publishedOn;


    /**
     * Get blogId
     *
     * @return integer 
     */
    public function getBlogId()
    {
        return $this->blogId;
    }

    /**
     * Set topicId
     *
     * @param integer $topicId
     * @return Blogs
     */
    public function setTopicId($topicId)
    {
        $this->topicId = $topicId;
        return $this;
    }

    /**
     * Get topicId
     *
     * @return integer 
     */
    public function getTopicId()
    {
        return $this->topicId;
    }

    /**
     * Set blogName
     *
     * @param string $blogName
     * @return Blogs
     */
    public function setBlogName($blogName)
    {
        $this->blogName = $blogName;
        return $this;
    }

    /**
     * Get blogName
     *
     * @return string 
     */
    public function getBlogName()
    {
        return $this->blogName;
    }

    /**
     * Set blogContent
     *
     * @param text $blogContent
     * @return Blogs
     */
    public function setBlogContent($blogContent)
    {
        $this->blogContent = $blogContent;
        return $this;
    }

    /**
     * Get blogContent
     *
     * @return text 
     */
    public function getBlogContent()
    {
        return $this->blogContent;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Blogs
     */
    public function setPublished($published)
    {
        $this->published = $published;
        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set blogCover
     *
     * @param text $blogCover
     * @return Blogs
     */
    public function setBlogCover($blogCover)
    {
        $this->blogCover = $blogCover;
        return $this;
    }

    /**
     * Get blogCover
     *
     * @return text 
     */
    public function getBlogCover()
    {
        return $this->blogCover;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Blogs
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
     * @return Blogs
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

    /**
     * Set publishedOn
     *
     * @param datetime $publishedOn
     * @return Blogs
     */
    public function setPublishedOn($publishedOn)
    {
        $this->publishedOn = $publishedOn;
        return $this;
    }

    /**
     * Get publishedOn
     *
     * @return datetime 
     */
    public function getPublishedOn()
    {
        return $this->publishedOn;
    }
}