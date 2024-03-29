<?php
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
use Cake\Event\Event;
use Cake\I18n\I18n;

// Prior to 3.5 use I18n::locale()
I18n::setLocale('es_PE');


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        $this->loadComponent('Auth', [
            'authorize'=> 'Controller',

            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    'finder' => 'auth'
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);
        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display']);


        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }

    public function changeLanguage($language=null){
    	if($language != null && in_array($language, ['en_US', 'es_PE', 'pt_BR']))
    	{
    		$this->request->session()->write('Config.language', $language);
    		return $this->redirect($this->referer());
    	}
    	else
    	{
    		$this->request->session()->write('Config.language', I18n::locale());
    		return $this->redirect($this->referer());
    	}
    }

    public function beforeFilter(Event $event)
    {
        if($this->request->session()->check('Config.language'))
        {
        	I18n::setLocale($this->request->session()->read('Config.language'));
        }
        else
        {
        	$this->request->session()->write('Config.language', I18n::locale());
        }

        $this->set('current_user', $this->Auth->user());
    }

    public function isAuthorized($user)
    {
        if(isset($user['role_id']) and $user['role_id'] == '1')
        {
            return true;
        }
        return false;
    }
}
