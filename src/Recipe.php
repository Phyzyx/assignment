<?php

namespace Leonvanderhaas\Assignment;

class Recipe {

  /**
   * @var \IngredientAmount[]
   */
  private array $ingredientAmounts = [];

  /**
   * @return \IngredientAmount[]
   */
  public function getIngredientAmounts(): array {
    return $this->ingredientAmounts;
  }

  /**
   * @param \IngredientAmount[] $ingredientAmount
   */
  public function setIngredientAmount(array $ingredientAmounts): void {
    $this->ingredientAmounts = $ingredientAmounts;
  }

  public function addIngredientAmount(IngredientAmount $ingredientAmount): void {
    $this->ingredientAmounts[] = $ingredientAmount;
  }

}
