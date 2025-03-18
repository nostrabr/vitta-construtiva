<?php

namespace Repositories;

require __DIR__ . '/../config/config.php';
use Repositories\AreaAtuacaoRepository;
echo json_encode(AreaAtuacaoRepository::getAll());
