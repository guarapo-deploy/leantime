<?php

namespace leantime\domain\services\connector {

    use leantime\core\service;

    class integrations implements service
    {
        private \leantime\domain\repositories\connector\integrations $integrationRepo;

        public function __construct(\leantime\domain\repositories\connector\integrations $integrationRepo)
        {
            $this->integrationRepo = $integrationRepo;
        }

        public function get(int $id): object|array|false
        {
            return $this->integrationRepo->get($id);
        }

        public function update(object|array $object): bool
        {
            // TODO: Implement update() method.
        }

        public function create(object|array $object): int|false
        {
            return $this->integrationRepo->insert($object);
        }

        public function delete(int $id): bool
        {
            // TODO: Implement delete() method.
        }

        public function getAll(array $searchparams = null): array|false
        {
            // TODO: Implement getAll() method.
        }

        public function patch(int $id, array $params): bool
        {
            return $this->integrationRepo->patch($id, $params);
        }
    }

}
