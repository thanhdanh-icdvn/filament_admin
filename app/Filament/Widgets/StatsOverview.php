<?php

namespace App\Filament\Widgets;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Coduo\PHPHumanizer\NumberHumanizer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total countries', NumberHumanizer::metricSuffix(Country::count()))
                ->description('Total countries of the world')
                ->descriptionIcon('heroicon-o-flag')
                ->color('success'),
            Stat::make('Total states', NumberHumanizer::metricSuffix(State::count()))
                ->description('Total states of the world')
                ->descriptionIcon('heroicon-o-building-library')
                ->color('primary'),
            Stat::make('Total cities', NumberHumanizer::metricSuffix(City::count()))
                ->description('Total cites of the world')
                ->descriptionIcon('heroicon-o-building-office-2')
                ->color('danger'),
        ];
    }
}
