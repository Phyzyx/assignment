<?php

namespace Leonvanderhaas\Assignment;

class IngredientAmount {

  private Ingredient $ingredient;
  private int $amount;

  /**
   * @param \Ingredient $ingredient
   * @param int $amount
   */
  public function __construct(Ingredient $ingredient, int $amount) {
    $this->ingredient = $ingredient;
    $this->amount = $amount;
  }

  /**
   * @return \Ingredient
   */
  public function getIngredient(): Ingredient {
    return $this->ingredient;
  }

  /**
   * @param \Ingredient $ingredient
   */
  public function setIngredient(Ingredient $ingredient): void {
    $this->ingredient = $ingredient;
  }

  /**
   * @return int
   */
  public function getAmount(): int {
    return $this->amount;
  }

  /**
   * @param int $amount
   */
  public function setAmount(int $amount): void {
    $this->amount = $amount;
  }

}
