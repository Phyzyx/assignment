<?php

namespace Leonvanderhaas\Assignment;

class IngredientBalancer {

  private const MAX_AMOUNT_OF_TEASPOONS = 25;

  /**
   * @var \Ingredient[]
   */
  private array $ingredients;
  private ScoringStrategy $scoringStrategy;

  /**
   * @param \Ingredient[] $ingredients
   * @param \ScoringStrategy $scoringStrategy
   */
  public function __construct(array $ingredients, ScoringStrategy $scoringStrategy) {
    $this->ingredients = $ingredients;
    $this->scoringStrategy = $scoringStrategy;
  }

  /**
   * @return \Ingredient[]
   */
  public function getIngredients(): array {
    return $this->ingredients;
  }

  /**
   * @param \Ingredient[] $ingredients
   */
  public function setIngredients(array $ingredients): void {
    $this->ingredients = $ingredients;
  }

  /**
   * @return \ScoringStrategy
   */
  public function getScoringStrategy(): ScoringStrategy {
    return $this->scoringStrategy;
  }

  /**
   * @param \ScoringStrategy $scoringStrategy
   */
  public function setScoringStrategy(ScoringStrategy $scoringStrategy): void {
    $this->scoringStrategy = $scoringStrategy;
  }

  public function getBestRecipeScore(): ?RecipeScore {
    $recipes = $this->generateRecipes();

    $bestRecipeScore = NULL;
    $bestScore = 0;
    /** @var \Recipe $recipe */
    foreach ($recipes as $recipe) {
      $totalAmountOfTeaspoons = array_reduce($recipe->getIngredientAmounts(), static function ($total, IngredientAmount $ingredientAmount) {
        return $total + $ingredientAmount->getAmount();
      });
      if ($totalAmountOfTeaspoons !== self::MAX_AMOUNT_OF_TEASPOONS) {
        continue;
      }

      $recipeScore = $this->scoringStrategy->score($recipe);
      $score = $recipeScore->getScore();
      if ($score === 0) {
        continue;
      }

      if ($score > $bestScore) {
        $bestRecipeScore = $recipeScore;
      }
    }

    return $bestRecipeScore;
  }

  private function generateRecipes(): \Generator {
    $numberOfIngredients = count($this->getIngredients());
    $permutationsCount = pow(self::MAX_AMOUNT_OF_TEASPOONS, $numberOfIngredients);

    for($i = 0; $i < $permutationsCount; $i++)
      yield $this->generateRecipe($numberOfIngredients, $i);
  }

  private function determineNextIndex(int $index, int $pos): int {
    return ($index - $pos) / self::MAX_AMOUNT_OF_TEASPOONS;
  }

  private function generateRecipe($numberOfIngredients, $index): Recipe {
    $recipe = new Recipe();
    for($i = 0; $i < $numberOfIngredients; $i++) {
      $amount = $index % self::MAX_AMOUNT_OF_TEASPOONS;
      $index = $this->determineNextIndex($index, $amount);
      if ($amount === 0) {
        continue;
      }

      $recipe->addIngredientAmount(new IngredientAmount($this->getIngredients()[$i], $amount));
    }
    return $recipe;
  }

}
