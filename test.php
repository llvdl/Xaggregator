<?php

require_once 'vendor/autoload.php';
$searchServiceFactory = new Factory\SearchServiceFactory();
$searchService = $searchServiceFactory->createAggregatorSearchService();
$results = $searchService->search('#paris');
var_dump($results);
