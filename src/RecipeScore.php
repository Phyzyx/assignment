<?php

namespace Leonvanderhaas\Assignment;

class RecipeScore {

  private Recipe $recipe;
  private int $score;

  /**
   * @param \Recipe $recipe
   * @param int $score
   */
  public function __construct(Recipe $recipe, int $score) {
    $this->recipe = $recipe;
    $this->score = $score;
  }

  /**
   * @return \Recipe
   */
  public function getRecipe(): Recipe {
    return $this->recipe;
  }

  /**
   * @param \Recipe $recipe
   */
  public function setRecipe(Recipe $recipe): void {
    $this->recipe = $recipe;
  }

  /**
   * @return int
   */
  public function getScore(): int {
    return $this->score;
  }

  /**
   * @param int $score
   */
  public function setScore(int $score): void {
    $this->score = $score;
  }

}
