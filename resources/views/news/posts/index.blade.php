<x-news.layout>
    <x-news.top-news-slider :lastestPosts="$lastestPosts"/>
    <x-news.main-news-slider :popularPosts="$popularPosts"/>
    <x-news.featured-news-slider :featuredPosts="$featuredPosts"/>
    <x-news.category-news-slider :categories="$categories"/>
    <x-news.news-with-sidebar>
        <x-news.news-container :popularPosts="$popularPosts" :lastestPosts="$lastestPosts"/>
    </x-news.news-with-sidebar>
</x-news.layout>
