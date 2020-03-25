<?php


namespace DPostInter;


class  Authentication
{
    private string $username = '';
    private string $password = '';


    public function __construct()
    {
        if (!empty(getenv('thailand_post_username')) && !empty(getenv('thailand_post_password'))) {
            $this->setUsername(getenv('thailand_post_username'));
            $this->setPassword(getenv('thailand_post_password'));
        }
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    protected function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    protected function setPassword(string $password)
    {
        $this->password = $password;
    }


}
