<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * BlogTopics
 *
 * @ORM\Table(name="blog_topics")
 * @ORM\Entity
 */
class BlogTopics
{
    /**
     * @var integer $topicId
     *
     * @ORM\Column(name="topic_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $topicId;

    /**
     * @var string $topicName
     *
     * @ORM\Column(name="topic_name", type="string", length=255, nullable=false)
     */
    private $topicName;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var datetime $addedOn
     *
     * @ORM\Column(name="added_on", type="datetime", nullable=false)
     */
    private $addedOn;

    /**
     * @var integer $isActive
     *
     * @ORM\Column(name="is_active", type="integer", nullable=false)
     */
    private $isActive;


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
     * Set topicName
     *
     * @param string $topicName
     * @return BlogTopics
     */
    public function setTopicName($topicName)
    {
        $this->topicName = $topicName;
        return $this;
    }

    /**
     * Get topicName
     *
     * @return string 
     */
    public function getTopicName()
    {
        return $this->topicName;
    }

    /**
     * Set description
     *
     * @param text $description
     * @return BlogTopics
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
     * Set addedOn
     *
     * @param datetime $addedOn
     * @return BlogTopics
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
     * Set isActive
     *
     * @param integer $isActive
     * @return BlogTopics
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
}