<?php

use Leonvanderhaas\Assignment\IngredientBalancer;
use Leonvanderhaas\Assignment\Ingredient;
use Leonvanderhaas\Assignment\HighScoreStrategy;

require __DIR__ . '/../vendor/autoload.php';

// Best recipe is:
// 1x sprinkles
// 15s butterscotch
// 10x chocolate
// 74x candy
// The corresponding score is 2160
$bestScoringRecipe = (new IngredientBalancer(
  [
    new Ingredient('sprinkles',2, 0, -2, 0, 3),
    new Ingredient('butterscotch',0, 5, -3, 0, 3),
    new Ingredient('chocolate',0, 0, 5, -1, 8),
    new Ingredient('candy',0, -1, 0, 5, 8),
  ],
  new HighScoreStrategy()
))->getBestRecipeScore();
