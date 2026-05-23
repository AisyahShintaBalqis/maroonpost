<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Post::count())
                ->description('Jumlah seluruh artikel')
                ->color('danger'),

            Stat::make('Total Kategori', Category::count())
                ->description('Jumlah kategori berita')
                ->color('warning'),

            Stat::make('Total Tag', Tag::count())
                ->description('Jumlah tag artikel')
                ->color('success'),
        ];
    }
}