<?php namespace Anomaly\UsersModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\UsersModule\User\Form\UserFormBuilder;
use Anomaly\UsersModule\User\Permission\PermissionFormBuilder;
use Anomaly\UsersModule\User\Table\UserPermissionTableBuilder;
use Anomaly\UsersModule\User\Table\UserTableBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Anomaly\UsersModule\User\UserBlocker;
use Anomaly\UsersModule\User\UserManager;

/**
 * Class UsersController
 *
 * This is the primary class for managing
 * users through the UI.
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\Http\Controller\Admin
 */
class UsersController extends AdminController
{

    /**
     * Return an index of existing users.
     *
     * @param UserTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(UserTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the form for creating a new user.
     *
     * @param UserFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(UserFormBuilder $form)
    {
        return $form->render();
    }

    /**
     * Return the form for editing an existing user.
     *
     * @param UserFormBuilder $form
     * @param                 $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(UserFormBuilder $form, $id)
    {
        return $form->render($id);
    }

    /**
     * Return the form for editing permissions.
     *
     * @param PermissionFormBuilder $form
     * @param                       $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function permissions(PermissionFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}
