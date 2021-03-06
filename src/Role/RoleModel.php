<?php namespace Anomaly\UsersModule\Role;

use Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel;
use Anomaly\UsersModule\Role\Contract\RoleInterface;

/**
 * Class RoleModel
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\RoleInterface
 */
class RoleModel extends UsersRolesEntryModel implements RoleInterface
{

    /**
     * The cache minutes.
     *
     * @var int
     */
    protected $cacheMinutes = 99999;

    /**
     * Get the role's ID.
     *
     * @return int
     */
    public function getId()
    {
        return $this->getKey();
    }

    /**
     * Get the role slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Get the role name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the role's permissions.
     *
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Return if a role as access to a the permission.
     *
     * @param string $permission
     * @return mixed
     */
    public function hasPermission($permission)
    {
        if ($this->getSlug() == 'admin') {
            return true;
        }

        if (!$this->getPermissions()) {
            return false;
        }

        if (array_get($this->getPermissions(), $permission) === true) {
            return true;
        }

        return false;
    }

    /**
     * Merge provided permissions onto existing ones.
     *
     * @param array $permissions
     * @return $this
     */
    public function mergePermissions(array $permissions)
    {
        $this->permissions = array_merge($this->getPermissions(), $permissions);

        return $this;
    }
}
