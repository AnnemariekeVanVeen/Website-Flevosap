<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/***
 * Class MigrationController; migrates the user
 */
class MigrationController extends BaseController
{
    public $file = './views/home';

    // migrates user from UserModel
    public function migrateUser()
    {
        UserModel::migrate();
    }
}
