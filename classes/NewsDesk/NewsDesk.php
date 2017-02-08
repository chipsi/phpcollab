<?php


namespace phpCollab\NewsDesk;

use phpCollab\Database;


/**
 * Class NewsDesk
 * @package phpCollab\NewsDesk
 */
class NewsDesk
{
    protected $newsdesk_gateway;
    protected $db;

    /**
     * NewsDesk constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
        $this->newsdesk_gateway = new NewsDeskGateway($this->db);
    }

    /**
     * @param $commentId
     * @return mixed
     */
    public function getNewsDeskCommentById($commentId)
    {
        return $this->newsdesk_gateway->getCommentById($commentId);
    }

    /**
     * @param $commentId
     * @return mixed
     */
    public function deleteNewsDeskComment($commentId)
    {
        return $this->newsdesk_gateway->deleteCommentById($commentId);
    }

}