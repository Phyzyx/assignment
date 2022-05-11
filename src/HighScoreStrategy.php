<?php

namespace Leonvanderhaas\Assignment;

class HighScoreStrategy implements ScoringStrategy {

  public function score(Recipe $recipe): RecipeScore {
    $properties = [
      'capacity' => 0,
      'durability' => 0,
      'flavor' => 0,
      'texture' => 0,
    ];
    foreach ($recipe->getIngredientAmounts() as $ingredientAmount) {
      $properties['capacity'] += $ingredientAmount->getIngredient()->getCapacity() * $ingredientAmount->getAmount();
      $properties['durability'] += $ingredientAmount->getIngredient()->getDurability() * $ingredientAmount->getAmount();
      $properties['flavor'] += $ingredientAmount->getIngredient()->getFlavor() * $ingredientAmount->getAmount();
      $properties['texture'] += $ingredientAmount->getIngredient()->getTexture() * $ingredientAmount->getAmount();
    }

    foreach ($properties as $key => $value) {
      if ($value < 0) {
        $properties[$key] = 0;
      }
    }

    $totalScore = array_reduce($properties, static function ($total, $property) {
      return $total * $property;
    }, 1);

    return new RecipeScore($recipe, $totalScore);
  }

}
