<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $this->viewBuilder()->setLayout('api');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
}
