<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $role = [];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $role = [
            'new'       => __('New User'),
            'user'      => __('Active User'),
            'manager'   => __('Manager'),
            'admin'     => __('Administrator'),
            'superuser' => __('Super Administrator'),
        ];
        
        //$this->Flash->success(__('Has been saved suc.'));
        //$this->Flash->error(__('Has been saved err.'));
        //$this->Flash->default(__('Has been saved def.'));
        //$this->Flash->warning(__('Has been saved war.'));
        //$this->Flash->info(__('Has been saved inf.'));
        
        //debug($this->request->getParam('action')); die();

        $cakedc['actions'] = [
            'socialLogin', 'login', 'logout', 'socialEmail', 'verify',  // LoginTrait
            'register', 'validateEmail',                                // RegisterTrait
            'changePassword', 'resetPassword', 'requestResetPassword',  // PasswordManagementTrait used in RegisterTrait
            'resendTokenValidation', 'linkSocial',                      // UserValidationTrait used in PasswordManagementTrait
            'u2f', 'u2fRegister', 'u2fRegisterFinish', 
            'u2fAuthenticate', 'u2fAuthenticateFinish', 'webauthn2fa', 
            'webauthn2faRegister', 'webauthn2faRegisterOptions', 
            'webauthn2faAuthenticate', 'webauthn2faAuthenticateOptions', //U2F actions
            'profile',
        ];

        if ($this->request->getParam('plugin') == 'CakeDC/Users' && $this->request->getParam('controller') == 'Users' && in_array($this->request->getParam('action'), $cakedc['actions']) ){
            $this->viewBuilder()->setLayout('cakedc');
        }

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }
}
