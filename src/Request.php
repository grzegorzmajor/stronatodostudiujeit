<?php
declare(strict_types=1);
namespace App;

class Request {
    public function __construct(
        private array $get,
        private array $post,
        private array $server
    ) {}
    public function action(): string {
        return $action = $this->get['action'] ?? 'indx'; // jeżeli w adresie nie ma "action" to zwróć 'indx'
    }

    public function postData():array{
        return $this->post;

    }
    public function isPost():bool {
        return $this->server['REQUEST_METHOD']=== 'POST';
    }
}