<?php

namespace App\Filament\Widgets;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Coduo\PHPHumanizer\NumberHumanizer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '10s';

    protected function getStats(): array
    {
        return [
            Stat::make('Total provinces', NumberHumanizer::metricSuffix(Province::count()))
                ->description('Total provinces')
                ->descriptionIcon('heroicon-o-flag')
                ->color('success'),
            Stat::make('Total districts', NumberHumanizer::metricSuffix(District::count()))
                ->description('Total districts')
                ->descriptionIcon('heroicon-o-building-library')
                ->color('primary'),
            Stat::make('Total wards', NumberHumanizer::metricSuffix(Ward::count()))
                ->description('Total wards')
                ->descriptionIcon('heroicon-o-building-office-2')
                ->color('danger'),
        ];
    }
}
