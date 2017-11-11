<?php


namespace TaskManagement\Data;


class TaskDTO
{
    private $id;
    private $title;
    private $description;
    private $location;
    private $author_id;
    private $category_id;
    private $started_on;
    private $due_date;
    private $category_name;
    private $first_name;
    private $last_name;

    public function create($title, $description, $location, $started_on, $due_date, $id = null, $author_id = null, $category_id = null, $category_name = null, $first_name = null, $last_name = null)
    {
        $taskDTO = new TaskDTO();

        $taskDTO
            ->setTitle($title)
            ->setDescription($description)
            ->setLocation($location)
            ->setStartedOn($started_on)
            ->setDueDate($due_date)
            ->setId($id)
            ->setAuthorId($author_id)
            ->setCategoryId($category_id)
            ->setCategoryName($category_name)
            ->setFirstName($first_name)
            ->setLastName($last_name);

        return $taskDTO;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * @param mixed $author_id
     */
    public function setAuthorId($author_id)
    {
        $this->author_id = $author_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartedOn()
    {
        return $this->started_on;
    }

    /**
     * @param mixed $started_on
     */
    public function setStartedOn($started_on)
    {
        $this->started_on = $started_on;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->due_date;
    }

    /**
     * @param mixed $due_date
     */
    public function setDueDate($due_date)
    {
        $this->due_date = $due_date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }



}