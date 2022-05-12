<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\Config;

use CodeIgniter\Events\Events;


Events::on('post_system', function () {
	service('audits')->save();
});

// Pre Controller events
Events::on('post_controller_constructor', static function () {
    service('amauchar')->boot();
});


// Events::on('sendEmail', function ($email, $code){
// 	echo "<br>Email has been sent successfully to this ". $email . " and your verification code is " . $code . "<br>";
// });
//        Events::trigger('sendEmail', 'john@test.com', 12345678);