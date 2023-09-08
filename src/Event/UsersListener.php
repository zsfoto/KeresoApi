<?php

namespace App\Event;

use Cake\Cache\Cache;
use Cake\Event\EventListenerInterface;

class UsersListener implements EventListenerInterface
{
    /**
     * @return string[]
     */
    public function implementedEvents(): array
    {
        return [
            \CakeDC\Users\Plugin::EVENT_BEFORE_LOGOUT => 'beforeLogout',
        ];
    }

    /**
     * @param \Cake\Event\Event $event
     */
    public function beforeLogout(\Cake\Event\Event $event)
    {
        $user = $event->getData('user');
        $controller = $event->getSubject();

        //your custom logic
        Cache::delete('dashboard_data_user_' . $user['id']);
        $controller->Flash->succes(__('Some message if you want'));

        //If you want to ignore the logout logic you can, just set an url array as result to use as redirect
        //$event->setResult(['plugin' => false, 'controller' => 'Page', 'action' => 'seeYouSoon']);
    }
}
