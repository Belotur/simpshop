<?php


namespace console\controllers;


use common\models\Admin;
use common\models\Page;
use yii\console\Controller;

/**
 * Контроллер приложения.
 */
class AppController extends Controller
{
    /**
     * Инициализация данных системы
     */
    public function actionInit(): void
    {
        $this->stdout('Инициализация данных системы...' . PHP_EOL);

        $this->initRoles();
        $this->initAdmins();
        //$this->initPages();

        $this->stdout('Инициализация данных завершена.' . PHP_EOL);
    }

    private function initRoles()
    {

    }

    /**
     * Добавляет учётную запись системного администратора.
     *
     * @throws \yii\base\Exception
     */
    private function initAdmins(): void
    {
        if (null === Admin::findOne(['email' => 'admin@mp.com'])) {
            $admin = new Admin([
                'email' => 'admin@mp.com',
                'username' => 'Admin',
                'status' => Admin::STATUS_ACTIVE,
            ]);
            $admin->setPassword('admin@mp.com');
            $admin->generateAuthKey();

            $admin->save();
        }
    }

    /**
     * Добавляет набор необходимых страниц.
     */
    public function initPages(): void
    {
        if (!Page::find()->withKey(Page::KEY_TERMS_OF_USE)->exists()) {
            $page = new Page([
                'key' => Page::KEY_TERMS_OF_USE,
                'title' => 'Пользовательское соглашение',
            ]);

            $page->save();
        }

        if (!Page::find()->withKey(Page::KEY_PROVISIONERS_OFFER)->exists()) {
            $page = new Page([
                'key' => Page::KEY_PROVISIONERS_OFFER,
                'title' => 'Оферта для поставщиков',
            ]);

            $page->save();
        }
    }
}