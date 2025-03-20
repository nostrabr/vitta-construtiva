<?php

namespace Repositories;

require __DIR__ . '/../config/config.php';
use Repositories\TextosImagensRepository;
echo json_encode(TextosImagensRepository::getAll());
