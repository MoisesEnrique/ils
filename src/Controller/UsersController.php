<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles']
        ];



        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Inscriptions']
        ]);

        $this->set('user', $user);

        
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
	{
		if ($this->request->is('post')) {

			// validate the user-entered Captcha code 
			$isHuman = captcha_validate($this->request->data['CaptchaCode']); 

			// clear previous user input, since each Captcha code can only be validated once 
			unset($this->request->data['CaptchaCode']); 

			if ($isHuman) { 
				$user = $this->Auth->identify();
				if ($user) {
					$this->Auth->setUser($user);
					return $this->redirect(array('controller' => 'Pages', 'action' => 'index'));
				}
			} else { 
				// Captcha validation failed, return an error message 
				$this->Flash->error(__('CAPTCHA validation failed, please try again.')); 
			} 
				
			$this->Flash->error(__('Your username or password is incorrect.'));
		}
	}

	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout']);

		// load the Captcha component and set its parameter 
		$this->loadComponent('CakeCaptcha.Captcha', [ 
			'captchaConfig' => 'ExampleCaptcha' 
		]); 
	}
	
	public function logout()
	{
		$this->Flash->success(__('You are now logged out.'));
		return $this->redirect($this->Auth->logout());
	}

	public function isAuthorized($user)
    {
        if(isset($user['role_id']) and $user['role_id'] == '2')
        {
            if(in_array($this->request->action, ['home', 'logout', 'view']))

            	return true;
        }

        if(isset($user['role_id']) and $user['role_id'] == '3')
        {
            if(in_array($this->request->action, ['home', 'logout', 'view']))

            	return true;
        }

        if(isset($user['role_id']) and $user['role_id'] == '4')
        {
            if(in_array($this->request->action, ['home', 'logout', 'view']))

            	return true;
        }
        return parent::isAuthorized($user);
    }



}
