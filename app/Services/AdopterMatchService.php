<?php

namespace App\Services;

use App\Models\Adopter;
use App\Models\Animals;
use Illuminate\Support\Collection;

class AdopterMatchService
{
    public function resolveAdopter(): ?Adopter
    {
        if (auth()->check()) {
            return auth()->user()->adopter;
        }

        return null;
    }

    public function rankAnimals(Collection $animals, Adopter $adopter): Collection
    {
        return $animals->map(function (Animals $animal) use ($adopter) {
            $animal->match_score = $this->scoreAnimal($animal, $adopter);
            return $animal;
        })->sortByDesc('match_score')->values();
    }

    private function scoreAnimal(Animals $animal, Adopter $adopter): int
    {
        $score = 0;

        if ($adopter->has_children) {
            $score += $animal->good_with_children ? 3 : -3;
        }
        if ($adopter->has_dogs) {
            $score += $animal->good_with_dogs ? 3 : -3;
        }
        if ($adopter->has_cats) {
            $score += $animal->good_with_cats ? 3 : -3;
        }

        if ($adopter->adopter_home_type === $animal->animal_home_type) {
            $score += 2;
        }
        if ($animal->needs_garden) {
            $score += in_array($adopter->adopter_home_type, ['House with garden', 'Farm'], true) ? 2 : -3;
        }
        if ($animal->working_animal) {
            $score += $adopter->adopter_home_type === 'Farm' ? 2 : -1;
        }

        $activityRank = ['Low' => 1, 'Medium' => 2, 'High' => 3];
        $adopterLevel = $activityRank[$adopter->adopter_activity_level] ?? 0;
        $animalLevel = $activityRank[$animal->animal_energy_level] ?? 0;
        $levelDiff = abs($adopterLevel - $animalLevel);
        if ($levelDiff === 0) {
            $score += 2;
        } elseif ($levelDiff === 1) {
            $score += 1;
        } else {
            $score -= 1;
        }

        $isAway = str_contains($adopter->work_schedule, 'Away');
        if ($isAway && $animal->can_be_left_alone) {
            $score += 2;
        } elseif ($isAway && !$animal->can_be_left_alone) {
            $score -= 2;
        } elseif (!$isAway && !$animal->can_be_left_alone) {
            $score += 1;
        } else {
            $score += 1;
        }

        if ($animal->animal_energy_level === 'High'
            && in_array($adopter->experience_level, ['None', 'Semi-Experienced'], true)) {
            $score -= 1;
        }

        return $score;
    }
}
