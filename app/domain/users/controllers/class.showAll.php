<?php

namespace leantime\domain\controllers {

    use leantime\core;
    use leantime\core\controller;
    use leantime\domain\models\auth\roles;
    use leantime\domain\repositories;
    use leantime\domain\services;
    use leantime\domain\services\auth;

    class showAll extends controller
    {
        private repositories\users $userRepo;
        private services\ldap $ldapService;

        public function init(repositories\users $userRepo, services\ldap $ldapService)
        {
            $this->userRepo = $userRepo;
            $this->ldapService = $ldapService;
        }

        public function get()
        {

            auth::authOrRedirect([roles::$owner, roles::$admin], true);



            //Only Admins
            if (auth::userIsAtLeast(roles::$admin)) {
                if (auth::userIsAtLeast(roles::$admin)) {
                    $this->tpl->assign('allUsers', $this->userRepo->getAll());
                } else {
                    $this->tpl->assign('allUsers', $this->userRepo->getAllClientUsers(auth::getUserClientId()));
                }

                $this->tpl->assign('admin', true);
                $this->tpl->assign('roles', roles::getRoles());

                $this->tpl->display('users.showAll');
            } else {
                $this->tpl->display('errors.error403');
            }
        }

        public function post($params)
        {
        }
    }

}
