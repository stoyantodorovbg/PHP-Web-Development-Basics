<?php


namespace TaskManagement\Repository;

use Database\DatabaseInterface;
use TaskManagement\Data\CategoryDTO;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * UserRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function showAll(): \Generator
    {
        return $this->db->query("
        SELECT 
        `id`,
        `name`
        FROM `categories`
        ")->execute()
            ->fetch(CategoryDTO::class);
    }

    public function getCount(): \Generator
    {
        return $this->db->query("
                SELECT 
                `categories`.`name`, 
                count(tasks.id) AS `count`
                FROM `tasks` INNER JOIN `categories` ON `tasks`.`category_id` = categories.id
                GROUP BY `categories`.`name`
                ORDER BY `count` DESC,
                `categories`.`name` ASC
        ")->execute()
            ->fetch(CategoryDTO::class);
    }


}