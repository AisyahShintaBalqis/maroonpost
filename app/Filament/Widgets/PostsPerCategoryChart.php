<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class PostsPerCategoryChart extends ChartWidget
{
    

    protected function getData(): array
    {
        $categories = Category::withCount('posts')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Berita',
                    'data' => $categories->pluck('posts_count')->toArray(),
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected ?string $heading = 'Jumlah Berita per Kategori';

    protected function getType(): string
    {
        return 'bar';
    }
}