<?php

namespace Leonvanderhaas\Assignment;

interface ScoringStrategy {

  public function score(Recipe $recipe): RecipeScore;

}
