<?php

namespace Pratiksh\Adminetic\Traits;

trait HasSlack
{
    protected $slack_url = null;

    public function routeNotificationForSlack()
    {
        return $this->slack_url;
    }

    /**
     * @param  $url
     * @return $this
     */
    public function setSlackUrl($url)
    {
        $this->slack_url = $url;

        return $this;
    }
}
