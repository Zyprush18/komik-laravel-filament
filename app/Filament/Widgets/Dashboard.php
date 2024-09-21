<?php

namespace App\Filament\Widgets;

use App\Models\Genre;
use App\Models\Komik;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class Dashboard extends BaseWidget
{
    protected function getStats(): array
    {
        $komik = Komik::count();
        $genre = Genre::count();
        return [
            Stat::make('Total Komik', $komik)
            ->description($komik .' increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            
            Stat::make('Total Genre', $genre)
            ->description($genre .' increase')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success')
        ];
    }
}
