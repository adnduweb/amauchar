<?php

namespace Amauchar\Core\Entities;

use Amauchar\Core\Models\UserAdresseModel;

class User extends \CodeIgniter\Shield\Entities\User
{

    /**
	 * Array of UUID fields that are stored in byte format.
	 *
	 * @param array
	 */

    protected $uuids = ['uuid'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'last_active',
    ];
    protected $casts = [
        'active'           => 'boolean',
        'force_pass_reset' => 'boolean',
        'permissions'      => 'array',
        'groups'           => 'array',
    ];



	/**
	 * Ensures our "original" values match the current values.
	 *
	 * @return $this
	 */
	public function syncOriginal()
	{
		$this->original = $this->attributes;

		if (! empty($this->uuids) && ! empty($this->attributes))
		{
			// Load Uuid service
			$uuidObj = service('uuid');

			// Loop through the UUID array fields
			foreach ($this->uuids as $uuid)
			{
				// Check if field is in byte format
				if (isset($this->attributes[$uuid]) && ! ctype_print($this->attributes[$uuid]))
				{
					$this->original[$uuid] = $uuidObj->fromBytes($this->attributes[$uuid])->toString();
				}
			}
		}

		return $this;
	}

	/**
	 * Magic method to all protected/private class properties to be easily set,
	 * either through a direct access or a `setCamelCasedProperty()` method.
	 *
	 * Examples:
	 *
	 *      $this->my_property = $p;
	 *      $this->setMyProperty() = $p;
	 *
	 * @param string $key
	 * @param null   $value
	 *
	 * @return $this
	 * @throws \Exception
	 */
	public function __set(string $key, $value = null)
	{
		// Check if field is uuid field and in byte format
		if (! empty($this->uuids) && in_array($key, $this->uuids) && ! ctype_print($value))
		{
			$value = service('uuid')->fromBytes($value)->toString();
		}

		return parent::__set($key, $value);
	}



     /**
     * Activate user.
     *
     * @return $this
     */
    public function activate()
    {
        $this->attributes['active'] = 1;
        $this->attributes['activate_hash'] = null;

        return $this;
    }

    /**
     * Unactivate user.
     *
     * @return $this
     */
    public function deactivate()
    {
        $this->attributes['active'] = 0;

        return $this;
    }

    /**
     * Checks to see if a user is active.
     *
     * @return bool
     */
    public function isActivated(): bool
    {
        return isset($this->attributes['active']) && $this->attributes['active'] == true;
    }

    /**
     * Renders out the user's avatar at the specified size (in pixels)
     *
     * @return string
     */
    public function renderAvatar(int $size = 52)
    {
        // Determine the color for the user based on their
        // email address since we know we'll always have that
        // Use default hash if the avatar is used as a placeholder
        if (setting('Users.avatarNameBasis') === 'name') {
            $idString = ! empty($this->first_name)
                ? ($this->first_name[0]) . ($this->last_name[0] ?? '')
                : $this->username[0]
                    ?? $this->email[0]
                        ?? 'default-avatar-hash';
        } else {
            $idString = ! empty($this->username)
                ? $this->username[0] . $this->username[1]
                : ($this->first_name[0]) . ($this->last_name[0] ?? '')
                    ?? $this->email[0]
                        ?? 'default-avatar-hash';
        }

        $idString = strtoupper($idString);

        $idValue = str_split($idString);
        array_walk($idValue, static function (&$char) {
            $char = ord($char);
        });
        $idValue = implode('', $idValue);

        $colors = setting('Users.avatarPalette');

        return view('\Amauchar\Core\Views\backend\\'.ADMIN_THEME.'\users\_avatar', [
            'user'       => $this,
            'size'       => $size,
            'fontSize'   => 20 * ($size / 52),
            'idString'   => $idString,
            'background' => $colors[$idValue % count($colors)],
        ]);
    }

    /**
     * Generates a link to the user Avatar
     */
    public function avatarLink(?int $size = null): string
    {
        if (empty($this->avatar)) {

            // Default from Gravatar
            if (setting('Users.useGravatar')) {
                $hash = md5(strtolower(trim($this->email)));

                return "https://www.gravatar.com/avatar/{$hash}?" . http_build_query([
                    's' => ($size ?? 60),
                    'd' => setting(
                        'Users.gravatarDefault'
                    ),
                ]);
            }
        }

        return ! empty($this->avatar)
            ? base_url('/uploads/avatars/' . $this->avatar)
            : '';
    }

    /**
     * Returns the full name of the user.
     */
    public function name(): string
    {
        return trim(implode(' ', [$this->first_name, $this->last_name]));
    }

    /**
     * @return string
     */
    public function adminLink(?string $postfix = null)
    {
        $url = ADMIN_AREA . "/users/{$this->id}";

        if (! empty($postfix)) {
            $url .= "/{$postfix}";
        }

        return trim(site_url($url));
    }

    /**
     * Returns a list of the groups the user is involved in.
     */
    public function groupsList(): string
    {
        $config = setting('AuthGroups.groups');
        $groups = $this->getGroups();

        $out = [];

        foreach ($groups as $group) {
            $out[] = $config[$group]['title'];
        }

        return implode(', ', $out);
    }

    /**
     * Returns the validation rules for all User meta fields, if any.
     */
    public function validationRules(?string $prefix = null): array
    {
        return $this->metaValidationRules('Users', $prefix);
    }

     /**
     * Creates a new Adresse for this user
     */
    public function createAdresseDefault()
    {
        model(UserAdresseModel::class)->insert([
            'user_id' => $this->id,
            'county'    => 'FR',
            'default'  => 1,
            'created_at'  => date('Y-m- H:i:s')
        ]);
    }

    public function getAuthGroupsUsers(): array
    {
        //print_r(model('GroupModel'));exit;
        $this->attributes['groups'] = model('GroupModel')
            ->where('user_id', $this->attributes['id'])
            ->orderBy('created_at', 'desc')
            ->findAll();
            return $this->attributes['groups'];
           
    }

    public function allCompanies(): array
    {

        //print_r(model('GroupModel'));exit;
        $this->attributes['allCompanies'] = model('CompanyModel')->findAll();
        return $this->attributes['allCompanies'];
           
    }

    public function getCompagny(): array
    {
        $this->attributes['company'] = model('CompanyModel')
            ->where('id', $this->attributes['company_id'])
            ->find();
            return $this->attributes['company'];
    }

    
    public function isSuperHero() {
        return  'superadmin';
    }


    public function isSuperCaptain() {
        return  'admin';
    }

    public function getFullName(){
        //print_r($this->attributes); exit;
        return ucfirst($this->attributes['last_name']) . ' ' . ucfirst($this->attributes['first_name']);
    }
}
